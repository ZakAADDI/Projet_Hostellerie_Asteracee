<?php

namespace App\Http\Repositories;

use App\Http\Resources\BookingResource;
use App\Models\Room;
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
        $nbrOfBookings = Booking::whereBetween('starting_date', [$from, $to])
            ->orWhereBetween('ending_date', [$from, $to])
            ->get();

        return count($nbrOfBookings);
    }

    public static function getRevenuesInPeriod($from, $to)
    {
        $totalRevenues = 0;
        $prices = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('is_confirmed', true)->pluck('total_price')->toArray();
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
        )->where('is_confirmed', true)->pluck('total_price')->toArray();
        $totalAmountOfBookings = 0;
        $nbrOfBookings = count($prices);
        if ($nbrOfBookings != 0) {
            foreach ($prices as $price) {
                $totalAmountOfBookings += $price;
            }
            $averageBasket = $totalAmountOfBookings / $nbrOfBookings;
            return round($averageBasket, 2);
        } else {
            return 0;
        }
    }

    public static function getTrendAverageBasketAmount($from, $to)
    {
        $totalRevenue = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('status','ended')->sum('total_price');

        $totalBookings = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->count();

        $allBookings = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('status','ended')->pluck('total_price')->toArray();

        $firstValue = reset($allBookings);
        $lastValue = end($allBookings);
        $growthRate = (($firstValue - $lastValue) / $lastValue) * 100;

        $averageBasketAmount = $totalBookings > 0 ? $totalRevenue / $totalBookings : 0;

        $datas = [];
        $datas['averageBasketOnPeriod'] = $averageBasketAmount;
        $datas['valueGrowthRate'] = $growthRate;
        if($growthRate > 0){
            $datas['trendBasketOnPeriod'] = '+';
        }else{
            $datas['trendBasketOnPeriod'] ='-';
        }
        return $datas;
    }

    public static function getBookingsOnPeriod($from, $to)
    {
        return BookingResource::Collection(Booking::whereBetween('starting_date', [$from, $to])
            ->orWhereBetween('ending_date', [$from, $to])
            ->get());
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
}
