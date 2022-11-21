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

        return response()->json($media, 200);
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
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $media = Media::where('id',$id)->first();
        return response()->json($media, 200);
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
            'url' => 'string|max:256',
            'alt' => 'string|max:256'
        ]);
        $media = Media::where('id',$id)->first();
        $media->update($request->all());

        return response()->json('Media ' .$id. ' updated!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $media = Media::where('id',$id)->first();
        $media->delete();
        return response()->json('Media ' .$id. ' deleted!', 200);
    }
}
