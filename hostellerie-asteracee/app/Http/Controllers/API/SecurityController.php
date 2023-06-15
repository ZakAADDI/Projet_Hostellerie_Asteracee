<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Nfc;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;

class SecurityController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function openDoor(Request $request)
    {
        $now = Carbon::now();
        $nfc = Nfc::where('hash', '=', $request->hash)->first();

        if (!$nfc){
            return response()->json([
                'open' => false,
                'error' => "no booking found with this hash!"
            ], 401);
        }

        $booking = Booking::findOrFail($nfc->booking_id);
        $today = Carbon::today();
        $endingDate = Carbon::create($booking->ending_date);

        if (($booking->room_id == $request->room_id)
            && ($endingDate->greaterThanOrEqualTo($today))
        ) {
            $history = new History();
            $history->used_at = $now;
            $history->nfc_id = $nfc->id;
            $history->save();
            return response()->json([
                'open' => true,
            ]);
        }
        return response()->json([
            'open' => false,
            'error'=>'RoomId or dates invalid!'
        ], 401);
    }
}
