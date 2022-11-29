<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $rooms = Room::all();

        return response()->json(RoomResource::Collection($rooms), 200);
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
            'price' => 'required|int',
            'type' => 'required|max:25',
            'description.fr' => 'required|max:256',
            'description.en' => 'required|max:256',
            'media_id' => 'required|exists:App\Models\Media,id|int',
            'capacity' => 'required|int'
        ]);

        $room = new Room;
        $room->fill($request->post())->save();

        return response()->json(RoomResource::make($room));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request,[
            'price' => 'int',
            'type' => 'max:25',
            'description.fr' => 'max:256',
            'description.en' => 'max:256',
            'media_id' => 'exists:App\Models\Media,id|int',
            'capacity' => 'int'
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());
        return response()->json(RoomResource::make($room));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json('Room ' .$id. ' deleted!');
    }
}
