<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestation;
use App\Http\Resources\PrestationResource;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $prestations = Prestation::all();

        return response()->json(PrestationResource::Collection($prestations),200);
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
            'name' => 'required|max:256',
            'media_id' => 'required|exists:App\Models\Media,id|int'
        ]);

        $prestation = new Prestation;
        $prestation->fill($request->post())->save();

        return response()->json(PrestationResource::make($prestation),201);
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
            'name' => 'required|max:256',
            'media_id' => 'required|exists:App\Models\Media,id|int'
        ]);

        $prestation = Prestation::findOrFail($id);
        $prestation->update($request->all());
        return response()->json(PrestationResource::make($prestation),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $prestation = Prestation::findOrFail($id);
        return response()->json(PrestationResource::make($prestation),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $prestation = Prestation::findOrFail($id);
        $prestation->delete();
        return response()->json('Prestation ' .$id. ' deleted!',200);
    }
}
