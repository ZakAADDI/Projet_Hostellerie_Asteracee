<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Resources\BookingResource;
use App\Http\Resources\RoomResource;
use App\Models\Booking;
use App\Models\Room;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'ending_date' => 'required|max:25',
            'starting_date' => 'required|max:256',
            'room_id' => 'required|exists:App\Models\Room,id|int',
            'user_id' => 'required|exists:App\Models\User,id|int',
            'occupants' => 'integer'
        ]);
        // DURATION
        $starting_date = $request->starting_date;
        $date1 = new DateTime($starting_date);
        $ending_date = $request->ending_date;
        $date2 = new DateTime($ending_date);
        $duration = $date2->diff($date1)->format("%a");

        //ROOM PRICE
        $room = Room::find($request->room_id);
        $roomData = $room->getRoomType()->firstOrFail();
        $roomPrice = $roomData->price;

        // OCCUPANTS & DAYS
        $occupants = $request->occupants;
        $occupantsDays = $occupants * $duration;

        //OPTIONS DURATION
        $nbrOfWeek = ceil($duration/7);
        $options = $request->options;

        //OPTIONS AMOUNT
        $optionAmount = 0;
        foreach($options as $option){
            if($option['type'] == "daily"){
                $optionAmount = $optionAmount + ($option['price'] * $duration) * $occupants;

            }
            if($option['type'] == "weekly"){
                $optionAmount = $optionAmount + $option['price'] * $nbrOfWeek;
            }
            if($option['type'] == "stay"){
                $optionAmount = $optionAmount + $option['price'];
            }
        }
        $total_room_price = $occupantsDays * $roomPrice ;


        $total_amount = $total_room_price + $optionAmount;
        try {
            $booking = new Booking;
            $booking->fill(array(
                'ending_date' => $ending_date,
                'starting_date' => $starting_date,
                'room_id' => $request->room_id,
                'user_id' => $request->user_id,
                'total_price' => $total_amount
            ))->save();

            return response()->json(BookingResource::make($booking));
        } catch (Throwable $e) {
            return response()->json($e);
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
        $this->validate($request,[
            'userId'=> 'int|max:6'
        ]);
        $id = $request->userId;
        $bookings = Booking::where('user_id',$id)->get();
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
        return response()->json(Booking::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request,[
            'ending_date' => 'max:25',
            'starting_date' => 'max:256',
            'room_id' => 'exists:App\Models\Room,id|int',
            'user_id' => 'exists:App\Models\User,id|int',
        ]);

        $booking = Booking::findOrFail($id);
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
        Booking::findOrFail($id)->delete();
        return response()->json('Entry ' .$id. ' deleted!');
    }

    public function confirmBooking(int $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->is_confirmed = true;
        $booking->save();
        return response()->json('ok');
    }
}
