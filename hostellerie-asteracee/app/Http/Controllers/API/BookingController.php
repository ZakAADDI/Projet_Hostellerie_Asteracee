<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BookingRepository;
use App\Http\Resources\BookingResource;
use App\Http\Repositories\RoomRepository;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Room;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Throwable;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(BookingResource::Collection(Booking::all()));
    }

    /**
     * Get duration of user's stay
     *
     * @param $from
     * @param $to
     * @return $duration
     */
    public function getDuration($from, $to)
    {
        $date1 = new DateTime($from);
        $date2 = new DateTime($to);
        $duration = $date2->diff($date1)->format("%a");
        return $duration;
    }

    /**
     * Get price of user's room
     *
     * @param $room_id
     * @return $roomPrice
     */
    public function getRoomPrice($room_id)
    {
        $room = Room::find($room_id);
        $roomData = $room->getRoomType()->firstOrFail();
        $roomPrice = $roomData->price;
        return $roomPrice;
    }

    /**
     * Get nbr of occupans * duration
     *
     * @param $occupants
     * @param $duratin
     * @return $occupantsDays
     */
    public function getOccupantsByDays($occupants, $duration)
    {
        $occupantsDays = $occupants * $duration;
        return $occupantsDays;
    }

    public function getTotalOptionsAmount($options, $duration, $nbrOfWeek, $occupants)
    {
        $optionAmount = 0;
        foreach ($options as $option) {
            if ($option['type'] == "daily") {
                $optionAmount = $optionAmount + ($option['price'] * $duration) * $occupants;
            }
            if ($option['type'] == "weekly") {
                $optionAmount = $optionAmount + $option['price'] * $nbrOfWeek;
            }
            if ($option['type'] == "stay") {
                $optionAmount = $optionAmount + $option['price'];
            }
        }
        return $optionAmount;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ending_date' => 'required|max:25',
            'starting_date' => 'required|max:256',
            'room_id' => 'required|exists:App\Models\Room,id|int',
            'user_id' => 'required|exists:App\Models\User,id|int',
            'occupants' => 'integer'
        ]);
        $roomStillAvailable = RoomRepository::checkAvailableRoom($request->starting_date, $request->ending_date, $request->room_id);

        if ($roomStillAvailable == true) {
            $duration = self::getDuration($request->starting_date, $request->ending_date);

            $roomPrice = self::getRoomPrice($request->room_id);

            $occupants = $request->occupants;

            $occupantsDays = self::getOccupantsByDays($occupants, $duration);

            $nbrOfWeek = ceil($duration / 7);

            $optionAmount = self::getTotalOptionsAmount($request->options, $duration, $nbrOfWeek, $occupants);

            $total_room_price = $occupantsDays * $roomPrice;

            $total_amount = $total_room_price + $optionAmount;

            try {
                $booking = new Booking;
                $booking->fill(array(
                    'ending_date' => $request->ending_date,
                    'starting_date' => $request->starting_date,
                    'room_id' => $request->room_id,
                    'user_id' => $request->user_id,
                    'total_price' => $total_amount,
                    'occupants' => $occupants
                ))->save();
                return response()->json(BookingResource::make($booking));
            } catch (Throwable $e) {
                return response()->json($e);
            }
        } else {
            return response()->json('Booking already exists', 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function findUserBookings(Request $request)
    {
        $this->validate($request, [
            'userId' => 'int|max:6'
        ]);
        $id = $request->userId;
        $bookings = Booking::where('user_id', $id)->get();
        return response()->json(BookingResource::Collection($bookings));
    }

     /**
     * Display commentable booking by user id.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function findCommentableBooking(Request $request)
    {
        $this->validate($request, [
            'userId' => 'int|max:6'
        ]);
        $id = $request->userId;
        $commentedReviewsIds = Review::pluck('booking_id')->toArray();
        $bookings = Booking::where('user_id',$id)->whereNotIn('id',$commentedReviewsIds)->where('status','ended')->get();
        return response()->json(BookingResource::Collection($bookings));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $booking = Booking::where('id',$id)->first();
        return response()->json(BookingResource::make($booking));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $bookingId)
    {
        $this->validate($request, [
            'ending_date' => 'max:25',
            'starting_date' => 'max:256',
            'room_id' => 'exists:App\Models\Room,id|int',
            'user_id' => 'exists:App\Models\User,id|int',
            'occupants' => 'int|max:3'
        ]);
        $booking = Booking::findOrFail($bookingId);
        $booking->update($request->all());

        return response()->json(BookingResource::make($booking));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $bookingToDelete = Booking::where('id',$id)->first();
        $bookingToDelete->status = 'canceled';
        $bookingToDelete->save();
        return response()->json('Entry ' . $id . ' canceled!',200);
    }

    public function confirmBooking(int $id)
    {
        $booking = Booking::findOrFail($id);
        $today = Carbon::today();
        $end = new Carbon($booking->ending_date);
        $start = new Carbon($booking->starting_date);

        if($today->greaterThanOrEqualTo($start) && $today->lessThanOrEqualTo($end)){
            $booking->is_confirmed = true;
            $booking->checkin_date = Carbon::now();
            $booking->save();
            return response()->json('OK');
        }

        return response()->json('NOK');
    }

    public function confirmedOngoingBooking(): \Illuminate\Http\JsonResponse
    {
        $bookings = BookingRepository::getConfirmedOngoingBookings();
        return response()->json(BookingResource::Collection($bookings));
    }
}
