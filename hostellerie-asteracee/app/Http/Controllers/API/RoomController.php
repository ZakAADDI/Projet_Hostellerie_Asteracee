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
        $this->validate($request,[
            'price' => 'required|int',
            'type' => 'required|max:25',
            'description_fr' => 'required|max:256',
            'description_en' => 'required|max:256',
            'media_id' => 'required|exists:App\Models\Media,id|int',
            'capacity' => 'required|int'
        ]);

        $room = Room::create([
            'price' => $request->price,
            'type' => $request->type,
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en,
            'media_id' => $request->media_id,
            'capacity' => $request->capacity,
        ]);

        return response()->json($room, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $room = Room::with('media')->where('id',$id)->get();
        return response()->json($room, 201);
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
            'type' => 'string|max:25',
            'description_fr' => 'string|max:256',
            'description_en' => 'string|max:256',
            'media_id' => 'exists:App\Models\Media,id|int',
            'capacity' => 'int'
        ]);
        $room = Room::where('id', $id)->first();
        $room->update($request->all());

        return response()->json($room, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $room = Room::where('id', $id)->first();
        $room->delete();

        return response()->json('Room ' .$id. ' deleted!');
    }
}
