<?php

namespace App\Http\Repositories;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;

class BookingRepository
{
    public static function getConfirmedOngoingBookings(): \Illuminate\Support\Collection{
        $yday = Carbon::yesterday();
        return Booking::whereRaw(
            "(ending_date > ?)",
            [$yday]
        )->where('is_confirmed',true)->get();
    }

    public static function getPeriodBookingAndCheckinInDays($from, $to)
    {
        return 'getPeriodBookingAndCheckinInDays';
    }

    public static function getTimeBetweenCheckinAndOpenDoor($from, $to)
    {
        return 'getTimeBetweenCheckinAndOpenDoor';
    }

    public static function getNbrOfBookinsInPeriod($from, $to)
    {
        $nbrOfBookings = Booking::whereBetween('starting_date', [$from, $to])
        ->orWhereBetween('ending_date', [$from, $to])
        ->get();

        return count($nbrOfBookings);
    }

    public static function getRevenuesInPeriod($from,$to)
    {
        $totalRevenues = 0;
        $prices = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from,$to]
        )->where('is_confirmed',true)->pluck('total_price')->toArray();
        foreach ($prices as $price) {
            $totalRevenues += $price;
        }
        return round($totalRevenues);
    }

    public static function getCurrentAverageBasketAmount($now)
    {
        $prices = Booking::whereRaw(
            "(ending_date = ?)",
            [$now]
        )->where('is_confirmed',true)->pluck('total_price')->toArray();
        $totalAmountOfBookings = 0;
        $nbrOfBookings = count($prices);
        if($nbrOfBookings != 0){
            foreach ($prices as $price) {
            $totalAmountOfBookings += $price;
        }
        $averageBasket= $totalAmountOfBookings / $nbrOfBookings ;
        return round($averageBasket,2);
        }else{
            return 0;
        }
    }

    public static function getTrendAverageBasketAmount($from,$to)
    {
        return 'getTrendAverageBasketAmount';
    }

    public static function getOptionsByType($from, $to)
    {
        return 'getOptionsByType';
    }

    public static function getRoomsByType($from, $to)
    {
        return 'getRoomsByType';
    }

    public static function getOccupationOnPeriod($from, $to)
    {
        $availableRooms = count(RoomRepository::getAvailableRooms($from,$to));
        $allRooms = count(Room::all());
        $roomsBooked = $allRooms - $availableRooms;
        $occupation = ($roomsBooked/$allRooms)*100;

        return round($occupation,2);
    }
}
