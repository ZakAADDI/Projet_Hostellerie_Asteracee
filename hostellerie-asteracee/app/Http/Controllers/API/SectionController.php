<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SectionResource;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sections = Section::all();

        return response()->json(SectionResource::Collection($sections));
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
            'name.fr' => 'required|string|max:100',
            'name.en' => 'required|string|max:100',
            'description.fr' => 'required|string|max:300',
            'description.en' => 'required|string|max:300'
        ]);

        $section = new Section;
        $section ->fill($request->post())
        ->setTranslations('name', $request->post('name'))
        ->setTranslations('description', $request->post('description'))
        ->save();

        return response()->json(SectionResource::make($section));
    }

     /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $section = Section::findOrFail($id);
        return response()->json(SectionResource::make($section));
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
            'name.fr' => 'string|max:100',
            'name.en' => 'string|max:100',
            'description.fr' => 'string|max:100',
            'description.en' => 'string|max:100'
        ]);
        $section = Section::findOrFail($id);
        $section->update($request->all());
        return response()->json(SectionResource::make($section));
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int $id
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function destroy(int $id)
    // {
    //     $section = Section::where('id',$id)->first();
    //     $section->delete();

    //     return response()->json('Section ' .$id. ' deleted!', 200);
    // }
}
