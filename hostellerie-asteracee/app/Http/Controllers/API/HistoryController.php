<?php

namespace App\Http\Controllers\API;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HistoryResource;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $history = History::all();

        return response()->json(HistoryResource::Collection($history));
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
            'nfc_id' => 'required|max:100',
            'used_at' => 'required|max:100',
        ]);

        $history = new History;
        $history ->fill($request->post())
        ->setTranslations('title', $request->post('title'))
        ->setTranslations('content', $request->post('content'))
        ->save();

        return response()->json(HistoryResource::make($history),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $history = History::where('id',$id)->first();
        return response()->json(HistoryResource::make($history));
    }
}
