<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Resources\RoomTypeResource;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $roomTypes = RoomType::all();

        return response()->json(RoomTypeResource::Collection($roomTypes), 200);
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
            'name' => 'required|max:128',
            'description' => 'required|max:256',
            'capacity' => 'required|int',
            'price' => 'required|int',
            'media_id' => 'required|exists:App\Models\Media,id|int'
        ]);

        $roomType = new RoomType;
        $roomType->fill($request->post())->save();

        return response()->json(RoomTypeResource::make($roomType));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $roomType = RoomType::findOrFail($id);
        return response()->json(RoomTypeResource::make($roomType));
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
            'name' => 'max:128',
            'description' => 'max:256',
            'capacity' => 'int',
            'price' => 'int',
            'media_id' => 'exists:App\Models\Media,id|int'
        ]);
        $roomType = RoomType::findOrFail($id);
        $roomType->update($request->all());
        return response()->json(roomTypeResource::make($roomType));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();
        return response()->json('RoomType ' .$id. ' deleted!');
    }
}
