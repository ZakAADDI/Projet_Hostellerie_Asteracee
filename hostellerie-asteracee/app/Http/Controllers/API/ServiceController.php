<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        return response()->json($services, 200);
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
            'media_id' => 'required|exists:App\Models\Media,id|int'
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
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $singleService = Service::with('media')->where('id',$id)->get();
        return response()->json($singleService, 200);
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
            'title_fr' => 'string|max:150',
            'title_en' => 'string|max:150',
            'content_fr' => 'string|max:256',
            'content_en' => 'string|max:256',
            'media_id' => 'exists:App\Models\Media,id|int'
        ]);
        $service = Service::where('id',$id)->first();
        $service->update([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'content_fr' => $request->content_fr,
            'content_en' => $request->content_en,
            'media_id' => $request->media_id,
        ]);
        return response()->json($service,200);
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
