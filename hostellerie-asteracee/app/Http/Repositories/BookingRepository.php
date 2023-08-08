<?php

namespace App\Http\Repositories;

use App\Models\Booking;
use App\Models\Option;
use App\Models\RoomType;
use Carbon\Carbon;

class BookingRepository
{
    public static function getConfirmedOngoingBookings(): \Illuminate\Support\Collection
    {
        $yday = Carbon::yesterday();
        return Booking::whereRaw(
            "(ending_date > ?)",
            [$yday]
        )->where('is_confirmed', true)->get();
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
        return Booking::whereBetween('starting_date', [$from, $to])
            ->orWhereBetween('ending_date', [$from, $to])
            ->get();
    }

    public static function getRevenuesInPeriod($from, $to)
    {
        return Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('is_confirmed', true)->pluck('total_price')->toArray();
    }

    public static function getCurrentAverageBasketAmount($now): array
    {
        return Booking::whereRaw(
            "(ending_date = ?)",
            [$now]
        )->where('is_confirmed', true)->pluck('total_price')->toArray();
    }

    public static function getTrendAverageBasketAmount($from, $to)
    {
        $totalRevenue = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('status','ended')->sum('total_price');

        $totalBookings = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to])->count();
        $allBookings = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('status','ended')->pluck('total_price')->toArray();

        $firstValue = reset($allBookings);
        $lastValue = end($allBookings);
        if($firstValue == false || $lastValue == false){
            $growthRate = 0;
        }else{
           $growthRate = (($firstValue - $lastValue) / $lastValue) * 100;
        }

        $averageBasketAmount = $totalBookings > 0 ? $totalRevenue / $totalBookings : 0;

        $datas = [];
        $datas['averageBasketOnPeriod'] = round($averageBasketAmount,2);
        $datas['valueGrowthRate'] = $growthRate;
        if($growthRate > 0){
            $datas['trendBasketOnPeriod'] = '+';
        }else{
            $datas['trendBasketOnPeriod'] ='-';
        }
        return $datas;
    }

    public static function getStatsByType($from, $to, $type)
    {
        $arrayStatsByType = [];
        $arrayBookingsOnPeriod = Booking::whereBetween('starting_date', [$from, $to])
            ->orWhereBetween('ending_date', [$from, $to])
            ->get();

        if($type == 'rooms'){
            foreach ($arrayBookingsOnPeriod as $booking) {
                $bookingRoomType = $booking->getRoom->getRoomType;
                $arrayStatsByType[] = $bookingRoomType->id;
            }
            $datas = RoomType::all();
        }
        if($type == 'options'){
            foreach ($arrayBookingsOnPeriod as $booking) {
                $bookingOptions = $booking->getBookingOptions;
                if (count($bookingOptions) != 0) {
                    foreach ($bookingOptions as $option) {
                        $arrayStatsByType[] = $option->option_id;
                    }
                }
            }
            $datas = Option::all();
        }
        $occurrences = [];
        foreach ($arrayStatsByType as $value) {
            if (!isset($occurrences[$value])) {
                $occurrences[$value] = 1;
            } else {
                $occurrences[$value]++;
            }
        }
        $stats = [];
        foreach ($datas as $data) {
            $typeId = $data->id;
            $typeName = $data->name;
            $stats[$typeId] = $typeName;
        }
        foreach ($occurrences as $key => $count) {
            if (isset($stats[$key])) {
                $result[$stats[$key]] = $count;
            }
        }
        return $result;
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

    public static function getConfirmedBookingOnPeriod($from, $to)
    {
        return Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('is_confirmed',true)->get();
    }

    public static function getMonthlyConfirmedBooking($m,$y){

        return Booking::where('is_confirmed',true)->whereYear('checkin_date',$y)->whereMonth('checkin_date',$m)->get();
    }

    public static function getCurrentBookings()
    {
        $today = Carbon::today();
        return Booking::whereRaw("(starting_date <= ? AND ending_date >= ?)", [$today, $today])->get();
    }
}
