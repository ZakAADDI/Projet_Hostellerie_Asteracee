<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $deals = Deal::all();
        return response()->json($deals);
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
            'title_fr' => 'required|string|max:100',
            'title_en' => 'required|string|max:100',
            'content_fr' => 'required|string|max:100',
            'content_en' => 'required|string|max:100',
            'is_active' => 'required|boolean'

        ]);
        $deals = Deal::create([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'content_fr' => $request->content_fr,
            'content_en' => $request->content_en,
            'is_active' => $request->is_active,
        ]);
        return response()->json($deals, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        return response()->json($deal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        $this->validate($request,[
            'title_fr' => 'string|max:100',
            'title_en' => 'string|max:100',
            'content_fr' => 'string|max:256',
            'content_en' => 'string|max:256',
            'is_active' => 'boolean'
        ]);
        $deal->update($request->all());
        return response()->json($deal,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        return response()->json('deleted');
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
        return response()->json($deals);
    }
}
