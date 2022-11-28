<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;
use App\Http\Resources\DealResource;
class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $deals = Deal::all();
        return response()->json(DealResource::Collection($deals), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title.fr' => 'required|string|max:100',
            'title.en' => 'required|string|max:100',
            'content.fr' => 'required|string|max:256',
            'content.en' => 'required|string|max:256',
            'is_active' => 'boolean'
        ]);

        $deal = new Deal;
        $deal
            ->fill($request->post())
            ->setTranslations('title', $request->post('title'))
            ->setTranslations('content', $request->post('content'))
            ->save();

        return response()->json(DealResource::make($deal), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $deal = Deal::findOrFail($id);
        return response()->json(DealResource::make($deal),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,int $id)
    {
        $this->validate($request,[
            'title.fr' => 'string|max:100',
            'title.en' => 'string|max:100',
            'content.fr' => 'string|max:256',
            'content.en' => 'string|max:256',
            'is_active' => 'boolean'
        ]);
        $deal = Deal::findOrFail($id);
        $deal->update($request->all());
        return response()->json(DealResource::make($deal), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        Deal::findOrFail($id)->delete();
        return response()->json('Deal '.$id.' deleted!');
    }

    /**
     * Sort deals and display 2.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showSorted()
    {
        $deals = Deal::where('is_active', '=', true)
                    ->orderBy('updated_at', 'asc')
                    ->limit(2)
                    ->get();
        return response()->json(DealResource::Collection($deals));

    }
}
