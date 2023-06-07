<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Nfc;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecurityController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function openDoor(Request $request)
    {
        $nfc = Nfc::where('hash', '=', $request->hash)->firstOrFail();
        $booking = Booking::findOrFail($nfc->booking_id);
        $now = Carbon::today();
        $endingDate = Carbon::create($booking->ending_date);

        if(($booking->room_id == $request->room_id)
         && ($endingDate->greaterThanOrEqualTo($now))
         ){ return true;}
         return false;
    }
}
