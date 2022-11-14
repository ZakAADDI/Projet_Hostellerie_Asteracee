<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $rooms = Room::with('media')->get();

        return response()->json($rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $room = Room::create([
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
            'media_id' => $request->media_id,
            'capacity' => $request->capacity,
        ]);

        return response()->json($room, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Room $room)
    {
        $room = Room::with('media')->where('id',$room->id)->get();
        return response()->json($room, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Room $room)
    {
        $room->update([
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
            'media_id' => $request->media_id,
            'capacity' => $request->capacity,
        ]);

        return response()->json($room, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json();
    }
}
