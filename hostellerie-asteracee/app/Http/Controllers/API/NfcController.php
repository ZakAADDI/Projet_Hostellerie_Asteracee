<?php

namespace App\Http\Controllers\API;

use App\Models\Nfc;
use Illuminate\Http\Request;
use App\Http\Resources\NfcResource;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class NfcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $nfc = Nfc::all();

        return response()->json(NfcResource::Collection($nfc));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $nfc = Nfc::findOrFail($id);
        return response()->json(NfcResource::make($nfc));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEndedAt(Request $request, $id)
    {
        $nfc = Nfc::findOrFail($id);
        if($nfc->ended_at == null){
            $nfc->ended_at = Carbon::now();
            $nfc->save();
        }
        return response()->json(NfcResource::make($nfc));
    }

}
