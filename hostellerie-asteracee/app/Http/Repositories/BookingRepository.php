<?php

namespace App\Http\Repositories;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingRepository
{
    public static function getConfirmedOngoingBookings(): \Illuminate\Support\Collection{
        $yday = Carbon::yesterday();
        return Booking::whereRaw(
            "(ending_date > ?)",
            [$yday]
        )->where('is_confirmed',true)->get();
    }

    public static function getCurrentBookings()
    {
        $today = Carbon::today();
        return Booking::whereRaw("(starting_date <= ? AND ending_date >= ?)", [$today, $today])->get();
    }
}