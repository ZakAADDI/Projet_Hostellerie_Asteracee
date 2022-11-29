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

        return response()->json(PrestationResource::Collection($prestations));
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

        $prestation = new Prestation;
        $prestation->fill($request->post())->save();

        return response()->json(PrestationResource::make($prestation));
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
        return response()->json(PrestationResource::make($prestation));
    }
}
