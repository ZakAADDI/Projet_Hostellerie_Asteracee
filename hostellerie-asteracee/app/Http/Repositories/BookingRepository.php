<?php

namespace App\Http\Repositories;

use App\Models\Booking;
use App\Models\History;
use App\Models\Nfc;
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
        $bookingsOnPeriod = self::getConfirmedBookingsWithStartingDate($from, $to);
        $timesInDaysDateChecking1Array = [];
        foreach ($bookingsOnPeriod as $booking) {

            $diffInDaysCheckin = Carbon::parse($booking->created_at)->floatDiffInDays(Carbon::parse($booking->checkin_date));
            $timesInDaysDateChecking1Array[] = $diffInDaysCheckin;
        }
        $diffInDaysCheckinDate = count($timesInDaysDateChecking1Array) > 0 ? strval(round(array_sum($timesInDaysDateChecking1Array) / count($timesInDaysDateChecking1Array),2)) : '-';

        return $diffInDaysCheckinDate;
    }

    public static function getTimeBetweenCheckinAndOpenDoor($from, $to)
    {
        $bookingsOnPeriod = self::getConfirmedBookingsWithStartingDate($from, $to);
        $minCounter= [];
        if (count($bookingsOnPeriod) > 0) {
            foreach ($bookingsOnPeriod as $booking) {
                $firstUse = HistoryRepository::getFistBookingOpenDoorHistory($booking->id);
                // dd($firstUse);
                if ($firstUse != null) {
                    $minCounter[] = Carbon::parse($booking->checkin_date)->floatDiffInMinutes(Carbon::parse($firstUse->used_at));
                }
            }
            if(count($minCounter) > 0) {
                 return array_sum($minCounter) / count($minCounter);
            }
        }
        return '-';
    }

    public static function getNbrOfBookinsInPeriod($from, $to)
    {
        return Booking::whereBetween('starting_date', [$from, $to])->orWhereBetween('ending_date', [$from, $to])->get();
    }

    public static function getRevenuesInPeriod($from, $to)
    {
        return Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('is_confirmed', true)->pluck('total_price')->toArray();
    }

    public static function getCurrentAverageBasketAmount($from,$to): array
    {
        return Booking::whereBetween('ending_date', [$from, $to])->where('is_confirmed', true)->pluck('total_price')->toArray();
    }

    public static function getTrendAverageBasketAmount($from, $to)
    {
        $totalRevenue = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('status', 'ended')->sum('total_price');

        $totalBookings = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('status', 'ended')->count();

        $allBookings = Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('status', 'ended')->pluck('total_price')->toArray();

        if ($from != $to) {
            $nbrOfDaysInPeriod = Carbon::parse($from)->DiffInDays(Carbon::parse($to));
        } else {
            $nbrOfDaysInPeriod = 0;
        }
        $carbonDate = Carbon::parse($from);

        $totalRevenueOnDay = [];
        while ($nbrOfDaysInPeriod >= 0) :
            $bookings = self::getBookingsPerDaysOnPeriod($carbonDate);
            $revenue = 0;
            foreach ($bookings as $booking) {
                $revenue += $booking->total_price;
            }
            $averageBasket = count($bookings) > 0 ? $revenue / count($bookings) : 0;
            $totalRevenueOnDay[$carbonDate->format('Y-m-d')] = $averageBasket;
            $carbonDate = $carbonDate->addDay();
            $nbrOfDaysInPeriod--;
        endwhile;


        $firstValue = reset($allBookings);

        $lastValue = end($allBookings);
        dd($allBookings);
        if ($firstValue == false || $lastValue == false) {
            // dd('here');
            $growthRate = 0;
        } else {
            $growthRate = (($lastValue - $firstValue) / $firstValue) * 100;
        }

        $averageBasketAmount = $totalBookings > 0 ? $totalRevenue / $totalBookings : 0;

        $datas = [];
        $datas['averageBasketOnPeriod'] = round($averageBasketAmount, 2);
        $datas['valueGrowthRate'] = $growthRate;
        if ($growthRate > 0) {
            $datas['trendBasketOnPeriod'] = '+';
        } else {
            $datas['trendBasketOnPeriod'] = '-';
        }
        $datas['valueToDisplay'] = $totalRevenueOnDay;
        return $datas;
    }

    public static function getStatsByType($from, $to, $type)
    {
        $arrayStatsByType = [];
        $arrayBookingsOnPeriod = Booking::whereBetween('starting_date', [$from, $to])
            ->orWhereBetween('ending_date', [$from, $to])
            ->get();

        if ($type == 'rooms') {
            foreach ($arrayBookingsOnPeriod as $booking) {
                $bookingRoomType = $booking->getRoom->getRoomType;
                $arrayStatsByType[] = $bookingRoomType->id;
            }
            $datas = RoomType::all();
        }
        if ($type == 'options') {
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
        $result = [];
        foreach ($occurrences as $key => $count) {
            if (isset($stats[$key])) {
                $result[$stats[$key]] = $count;
            }
        }
        return $result;
    }

    public static function getConfirmedOngoingBookingsPerDay($d): \Illuminate\Support\Collection
    {
        $day = Carbon::parse($d);
        return Booking::whereRaw(
            "(ending_date >= ?)",
            [$day]
        )
            ->whereRaw(
                "(starting_date <= ?)",
                [$day]
            )
            ->where('is_confirmed', true)->get();
    }

    public static function getConfirmedBookingsWithStartingDate($from, $to)
    {
        return Booking::whereBetween('starting_date', [$from, $to])->orWhereBetween('ending_date', [$from, $to])->where('is_confirmed', true)->get();
    }

    public static function getConfirmedBookingOnPeriod($from, $to)
    {
        return Booking::whereRaw(
            "(starting_date >= ? AND ending_date <= ?)",
            [$from, $to]
        )->where('is_confirmed', true)->get();
    }

    public static function getBookingsPerDaysOnPeriod($day): \Illuminate\Support\Collection
    {
        return Booking::whereRaw(
            "(ending_date = ?)",
            [Carbon::parse($day)]
        )
            ->where('is_confirmed', true)->get();
    }

    public static function getMonthlyConfirmedBooking($m, $y)
    {

        return Booking::where('is_confirmed', true)->whereYear('checkin_date', $y)->whereMonth('checkin_date', $m)->get();
    }

    public static function getCurrentBookings()
    {
        $today = Carbon::today();
        return Booking::whereRaw("(starting_date <= ? AND ending_date >= ?)", [$today, $today])->get();
    }
}
