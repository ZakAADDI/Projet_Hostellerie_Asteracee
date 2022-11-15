<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $media = Media::all();

        return response()->json($media);
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
            'url' => 'required|max:256',
            'alt' => 'required|max:256'
        ]);

        $media = Media::create([
            'url' => $request->url,
            'alt' => $request->alt
        ]);

        return response()->json($media, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Media $media)
    {
        return response()->json($media);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Media $media)
    {
        $this->validate($request,[
            'url' => 'required|max:256',
            'alt' => 'required|max:256'
        ]);

        $media->update([
            'url' => $request->url,
            'alt' => $request->alt
        ]);

        return response()->json($media, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Media $media)
    {
        $media->delete();

        return response()->json();
    }
}