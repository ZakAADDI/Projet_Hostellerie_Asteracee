<?php

namespace App\Http\Repositories;

use App\Models\Booking;
use App\Models\History;
use App\Models\Nfc;
use Carbon\Carbon;

class HistoryRepository
{
    public static function getFistBookingOpenDoorHistory($bookingId)
    {
        $nfcIds = Nfc::where('booking_id', $bookingId)->pluck('id');

        if (count($nfcIds) > 0) {
            $firstHistory = History::whereIn('nfc_id', $nfcIds)->orderBy('used_at', 'ASC')->firstOrFail();

            return $firstHistory;
        } else {

            return [];
        }
    }
}
