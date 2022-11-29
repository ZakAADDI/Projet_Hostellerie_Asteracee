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

        return response()->json(InfoResource::Collection($infos));
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
            'content.fr' => 'required|string|max:300',
            'content.en' => 'required|string|max:300',
            'media_id' => 'required|exists:App\Models\Media,id|int',
            'publication_date' => 'required|string|max:10'
        ]);

        $info = new Info;
        $info ->fill($request->post())
        ->setTranslations('title', $request->post('title'))
        ->setTranslations('content', $request->post('content'))
        ->save();

        return response()->json(InfoResource::make($info));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $info = Info::with('media')->findOrFail($id);
        return response()->json(InfoResource::make($info));
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
            'content.fr' => 'string|max:100',
            'content.en' => 'string|max:100',
            'media_id' => 'exists:App\Models\Media,id|int'
        ]);
        $info = Info::findOrFail($id);
        $info->update($request->all());
        return response()->json(InfoResource::make($info));
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

        return response()->json('Info ' .$id. ' deleted!');
    }
}
