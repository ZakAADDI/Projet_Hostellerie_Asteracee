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

    public static function getConfirmedOngoingBookingsPerDay($d): \Illuminate\Support\Collection{
        $day = Carbon::parse($d);
        return Booking::whereRaw(
            "(ending_date >= ?)",
            [$day]
        )
            ->whereRaw(
                "(starting_date <= ?)",
                [$day]
            )
            ->where('is_confirmed',true)->get();
    }

    public static function getMonthlyConfirmedBooking($m,$y){

        return Booking::where('is_confirmed',true)->whereYear('checkin_date',$y)->whereMonth('checkin_date',$m)->get();
    }
}
