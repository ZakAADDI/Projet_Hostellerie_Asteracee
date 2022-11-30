<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Resources\OptionResource;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $options = Option::all();
        return response()->json(OptionResource::Collection($options));
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
            'name.fr' => 'required|max:128',
            'name.en' => 'required|max:128',
            'description.fr' => 'required|max:256',
            'description.en' => 'required|max:256',
            'price' => 'required|int',
        ]);

        $option = new Option;
        $option->fill($request->post())->save();

        return response()->json(OptionResource::make($option));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $option = Option::findOrFail($id);
        return response()->json(OptionResource::make($option));
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
            'name.fr' => 'max:128',
            'name.en' => 'max:128',
            'description.fr' => 'max:256',
            'description.en' => 'max:256',
            'price' => 'int',
        ]);
        $option = Option::findOrFail($id);
        $option->update($request->all());
        return response()->json(OptionResource::make($option));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $option = Option::findOrFail($id);
        $option->delete();
        return response()->json('Option ' .$id. ' deleted!');
    }
}
