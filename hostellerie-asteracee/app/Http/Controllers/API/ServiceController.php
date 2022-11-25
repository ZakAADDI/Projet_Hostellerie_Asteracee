<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Resources\ServiceResource;
use App\Models\Media;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $services = Service::all();
        return response()->json(ServiceResource::Collection($services), 200);
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
            'title.fr' => 'required|string|max:100',
            'title.en' => 'required|string|max:100',
            'content.fr' => 'required|string|max:256',
            'content.en' => 'required|string|max:256',
            'media_id' => 'required|exists:App\Models\Media,id|int'
        ]);

        $service = new Service;
        $service
            ->fill($request->post())
            ->save();

        return response()->json(ServiceResource::make($service), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $service = Service::with('media')->findOrFail($id);
        return response()->json($service,200);
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
            'title.fr' => 'string|max:100',
            'title.en' => 'string|max:100',
            'content.fr' => 'string|max:256',
            'content.en' => 'string|max:256',
            'media_id' => 'exists:App\Models\Media,id|int'
        ]);
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return response()->json(ServiceResource::make($service),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $service = Service::where('id',$id)->first();
        $service->delete();
        return response()->json('Service '.$id.' deleted!',200);
    }
}
