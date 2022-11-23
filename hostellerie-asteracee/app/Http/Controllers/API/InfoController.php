<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use App\Http\Resources\InfoResource;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $infos = Info::with('media')->get();

        return response()->json(InfoResource::Collection($infos), 200);
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
            'media_id' => 'required|exists:App\Models\Media,id|int'
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
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $singleInfo = Info::with('media')->where('id',$id)->get();
        return response()->json($singleInfo, 200);
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
            'title_fr' => 'string|max:100',
            'title_en' => 'string|max:100',
            'content_fr' => 'string|max:100',
            'content_en' => 'string|max:100',
            'media_id' => 'exists:App\Models\Media,id|int'
        ]);
        $info = Info::where('id', $id)->first();
        $info->update($request->all());

        return response()->json($info, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $info = Info::where('id',$id)->first();
        $info->delete();

        return response()->json('Info ' .$id. ' deleted!', 200);
    }
}
