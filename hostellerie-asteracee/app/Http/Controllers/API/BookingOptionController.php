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
        $this->validate($request,[
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingOption  $booking_option
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request,[
            'booking_id' => 'exists:App\Models\Booking,id|int',
            'option_id' => 'exists:App\Models\Option,id|int'
        ]);

        $booking_option = BookingOption::findOrFail($id);
        $booking_option->update($request->all());

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
