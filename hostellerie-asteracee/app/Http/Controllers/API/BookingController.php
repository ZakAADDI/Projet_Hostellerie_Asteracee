<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

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
            'card_number' => 'required|string'
        ]);

        $booking = new Booking;
        $booking->fill($request->post())->save();

        return response()->json(BookingResource::make($booking));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
//        return response()->json(BookingResource::make(Booking::findOrFail($id)));
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
            'card_number' => 'string'
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
}
