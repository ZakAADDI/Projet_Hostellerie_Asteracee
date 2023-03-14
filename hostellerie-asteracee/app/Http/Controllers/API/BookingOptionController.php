<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingOptionResource;
use App\Models\BookingOption;
use Illuminate\Http\Request;

class BookingOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(BookingOptionResource::collection(BookingOption::all()));
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
            'booking_id' => 'required|exists:App\Models\Booking,id|int',
            'option_id' => 'required|exists:App\Models\Option,id|int'
        ]);

        $booking_option = new BookingOption();
        $booking_option->fill($request->post())->save();

        return response()->json(BookingOptionResource::make($booking_option));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingOption  $booking_option
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        return response()->json(BookingOption::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $booking_id = $request->booking_id;

        $booking_option = BookingOption::where('booking_id', $booking_id)->pluck('option_id')->toArray();

        $newOptions = $request->options;

        if (count($newOptions) > 0) {
            foreach ($newOptions as $newOption) {
                if (!in_array($newOption, $booking_option)) {
                    $bookingOption = new BookingOption();
                    $bookingOption->fill(array(
                        'booking_id' => $booking_id,
                        'option_id' => $newOption
                    ))->save();
                }
            }
        }
        if ($newOptions == []) {
            BookingOption::where('booking_id', $booking_id)->delete();
            return response()->json([], 200);
        }
        if(count($newOptions) != count($booking_option)){
            foreach($booking_option as $oldOption){
                if(!in_array($oldOption, $newOptions)){
                    BookingOption::where('booking_id',$booking_id)
                    ->where('option_id',$oldOption)->delete();
                }
            }
        }
        return response()->json($booking_option);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingOption  $booking_option
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        BookingOption::findOrFail($id)->delete();
        return response()->json('Entry ' . $id . ' deleted!');
    }
}
