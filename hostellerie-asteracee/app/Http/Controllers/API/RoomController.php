<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\RoomRepository;
use App\Http\Resources\FilteredRoomResource;
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
    public function index(Request $request)
    {
        $startingDate = $request->input('starting');
        $endingDate = $request->input('ending');

        if ($startingDate && $endingDate){
            $rooms = RoomRepository::getAvailableRooms($startingDate,$endingDate);
        } else {
            $rooms = Room::all();
        }

//        return response()->json($rooms);
        return response()->json(RoomResource::Collection($rooms));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'room_types_id' => 'required|max:25',
            'number' => 'required|room_number|int',
        ]);

        $room = new Room;
        $room->fill($request->post())->save();

        return response()->json(RoomResource::make($room));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Room $room)
    {
//        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'room_types_id' => 'max:25',
            'number' => 'unique:App\Models\Room,room_number|int'
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());
        return response()->json(RoomResource::make($room));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json('Room ' . $id . ' deleted!', 200);
    }
}
