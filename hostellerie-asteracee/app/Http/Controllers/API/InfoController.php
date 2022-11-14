<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $infos = Info::with('media')->get();

        return response()->json($infos);
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
            'title_fr' => 'required|max:100',
            'title_en' => 'required|max:100',
            'content_fr' => 'required|max:100',
            'content_en' => 'required|max:100',
            'media_id' => 'required|int'
        ]);

        $info = Info::create([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'content_fr' => $request->content_fr,
            'content_en' => $request->content_en,
            'media_id' => $request->media_id,
        ]);
        return response()->json($info, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Info $info): \Illuminate\Http\JsonResponse
    {
        $singleInfo = Info::with('media')->where('id',$info->id)->firstOrFail();
        return response()->json($singleInfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Info $info)
    {
        $this->validate($request,[
            'title_fr' => 'required|max:100',
            'title_en' => 'required|max:100',
            'content_fr' => 'required|max:100',
            'content_en' => 'required|max:100',
            'media_id' => 'required|int'
        ]);

        $info->update([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'content_fr' => $request->content_fr,
            'content_en' => $request->content_en,
            'media_id' => $request->media_id,
        ]);

        return response()->json($info,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Info $info)
    {
        $info->delete();

        return response()->json();
    }
}
