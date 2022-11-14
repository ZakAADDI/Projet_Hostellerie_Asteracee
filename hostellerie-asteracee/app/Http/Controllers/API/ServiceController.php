<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $services = Service::with('media')->get();

        return response()->json($services);
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
            'title_fr' => 'required|max:150',
            'title_en' => 'required|max:150',
            'content_fr' => 'required|max:256',
            'content_en' => 'required|max:256',
            'media_id' => 'required|int'
        ]);

        $service = Service::create([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'content_fr' => $request->content_fr,
            'content_en' => $request->content_en,
            'media_id' => $request->media_id,
        ]);
        return response()->json($service, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Service $service)
    {
        $singleService = Service::with('media')->where('id',$service->id)->get();

        return response()->json($singleService);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request,[
            'title_fr' => 'required|max:150',
            'title_en' => 'required|max:150',
            'content_fr' => 'required|max:256',
            'content_en' => 'required|max:256',
            'media_id' => 'required|int'
        ]);
        
        $service->update([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'content_fr' => $request->content_fr,
            'content_en' => $request->content_en,
            'media_id' => $request->media_id,
        ]);

        return response()->json($service,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json();
    }
}
