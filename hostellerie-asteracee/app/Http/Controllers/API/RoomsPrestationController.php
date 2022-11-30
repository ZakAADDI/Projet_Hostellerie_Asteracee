<?php

namespace App\Http\Controllers\API;
use App\Models\RoomsPrestation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RoomsPrestationResource;

class RoomsPrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $prestations = RoomsPrestation::all();
        return response()->json(RoomsPrestationResource::Collection($prestations), 200);

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
            'prestation_id' => 'required|max:25',
            'room_type_id' => 'required|max:25'
        ]);

        $roomPrestation = new RoomsPrestation;
        $roomPrestation->fill($request->post())->save();

        return response()->json(RoomsPrestationResource::make($roomPrestation),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $roomPrestation = RoomsPrestation::findOrFail($id);
        return response()->json(RoomsPrestationResource::make($roomPrestation));
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
            'prestation_id' => 'int|max:25',
            'room_type_id' => 'int|max:25'
        ]);

        $roomPrestation = RoomsPrestation::findOrFail($id);
        $roomPrestation->update($request->all());
        return response()->json(RoomsPrestation::make($roomPrestation),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        //
    }
}
