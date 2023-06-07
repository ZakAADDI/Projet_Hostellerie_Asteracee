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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $nfcCards = Nfc::Where('booking_id', '=', $request->booking_id)->get();
        //dd(count($nfcCards));
        if (count($nfcCards) < 2) {
            $nfc = new Nfc;
            $now = Carbon::now();
            $nfc->hash = md5($request->booking_id . $now);
            $nfc->booking_id = $request->booking_id;

            $nfc->save();
            return response()->json(NfcResource::make($nfc), 201);
        }
        return response()->json("too many cards already created!", 401);
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
        if ($nfc->ended_at == null) {
            $nfc->ended_at = Carbon::now();
            $nfc->save();
        }
        return response()->json(NfcResource::make($nfc));
    }
}
