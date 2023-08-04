<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BookingRepository;
use App\Http\Repositories\HistoryRepository;
use App\Models\Booking;
use App\Models\History;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     *
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDashboardDatas()
    {
        return 'getDashboardDatas';
    }

    /**
     *
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookingsDatas()
    {
        return 'getBookingsDatas';
    }

    /**
     *
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEfficiencyDatas(Request $request)
    {
        $date1 = $request->month1;
        $date2 = $request->month2;
        $m1 = Carbon::parse($date1)->month;
        $m2 = Carbon::parse($date2)->month;
        $y1 = Carbon::parse($date1)->year;
        $y2 = Carbon::parse($date2)->year;
        $lastDay1 = Carbon::parse($date1)->endOfMonth()->day;
        $lastDay2 = Carbon::parse($date1)->endOfMonth()->day;
        $timesInDaysDateChecking1Array = [];
        $timesInDaysDateChecking2Array = [];
        $timesInMinsDate1ReceptionArray = [];
        $timesInMinsDate2ReceptionArray = [];

        $bookingsDate1 = BookingRepository::getMonthlyConfirmedBooking($m1,$y1);
        $bookingsDate2 = BookingRepository::getMonthlyConfirmedBooking($m2,$y2);

        $nbOfRooms = count(Room::all());

        $globalDaysCount1 = $nbOfRooms*$lastDay1;
        $globalDaysCount2 = $nbOfRooms*$lastDay2;
        $globalOccupiedDaysCount1 = 0;
        $globalOccupiedDaysCount2= 0;

        $salesAmountDate1Array = [];
        $salesAmountDate2Array = [];

        foreach ($bookingsDate1 as $b){
            $salesAmountDate1Array[] = $b->total_price;

            $bookingTimeInDays = Carbon::parse($b->strating_date)->floatDiffInDays(Carbon::parse($b->endinging_date));
            $globalOccupiedDaysCount1 += $bookingTimeInDays;

            $diffInDaysCheckin = Carbon::parse($b->created_at)->floatDiffInDays(Carbon::parse($b->checkin_date));
            $timesInDaysDateChecking1Array[] = $diffInDaysCheckin;

            $firstOpenDoorHistory = HistoryRepository::getFistBookingOpenDoorHistory($b->id);
            if ($firstOpenDoorHistory != null){
                $timesInMinsDate1ReceptionArray[] = Carbon::parse($b->checkin_date)->floatDiffInMinutes(Carbon::parse($firstOpenDoorHistory->used_at));
            }
        }
        foreach ($bookingsDate2 as $b){
            $salesAmountDate2Array[] = $b->total_price;

            $bookingTimeInDays = Carbon::parse($b->starting_date)->floatDiffInDays(Carbon::parse($b->ending_date));
            $globalOccupiedDaysCount2 += $bookingTimeInDays;

            $diffInDaysCheckin = Carbon::parse($b->created_at)->floatDiffInDays(Carbon::parse($b->checkin_date));
            $timesInDaysDateChecking2Array[] = $diffInDaysCheckin;

            $firstOpenDoorHistory = HistoryRepository::getFistBookingOpenDoorHistory($b->id);
            if ($firstOpenDoorHistory != null){
                $timesInMinsDate2ReceptionArray[] = Carbon::parse($b->checkin_date)->floatDiffInMinutes(Carbon::parse($firstOpenDoorHistory->used_at));
            }
        }

        $diffInDaysCheckinDate1 = count($timesInDaysDateChecking1Array)>0 ? strval(array_sum($timesInDaysDateChecking1Array)/count($timesInDaysDateChecking1Array)) : '-';
        $diffInDaysCheckinDate2 = count($timesInDaysDateChecking2Array)>0 ? strval(array_sum($timesInDaysDateChecking2Array)/count($timesInDaysDateChecking2Array)) : '-';
        $diffInMinsReceptionDate1 = count($timesInMinsDate1ReceptionArray)>0 ? strval(array_sum($timesInMinsDate1ReceptionArray)/count($timesInMinsDate1ReceptionArray)) : '-';
        $diffInMinsReceptionDate2 = count($timesInMinsDate2ReceptionArray)>0 ? strval(array_sum($timesInMinsDate2ReceptionArray)/count($timesInMinsDate2ReceptionArray)) : '-';
        $occupiedRateDate1 = ($globalOccupiedDaysCount1/$globalDaysCount1)*100;
        $occupiedRateDate2 = ($globalOccupiedDaysCount2/$globalDaysCount2)*100;
        $salesAmountDate1 = count($salesAmountDate1Array)>0 ? strval(array_sum($salesAmountDate1Array)) : '-';
        $salesAmountDate2 = count($salesAmountDate2Array)>0 ? strval(array_sum($salesAmountDate2Array)) : '-';
        $bookingAmountDate1 = count($bookingsDate1);
        $bookingAmountDate2 = count($bookingsDate2);
        $averageCarteDate1 = $bookingAmountDate1 > 0 ? (array_sum($salesAmountDate1Array))/$bookingAmountDate1 : "-";
        $averageCarteDate2 = $bookingAmountDate2 > 0 ? (array_sum($salesAmountDate2Array))/$bookingAmountDate2 : "-";
        $fillRateArray1 = [
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,1,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,3,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,7,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,10,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,14,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,20,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,23,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,25,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,28,1)))/$nbOfRooms)*100,
        ];

        $fillRateArray2 = [
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,1,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,3,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,7,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,10,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,14,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,20,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,23,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,25,1)))/$nbOfRooms)*100,
            (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,28,1)))/$nbOfRooms)*100,
        ];

        return response()->json([
            "date_1" => [
                "average_checkin_time" => $diffInDaysCheckinDate1,
                "average_reception_time" => $diffInMinsReceptionDate1,
                "occupation_rate" => $occupiedRateDate1,
                "fill_rate" => $fillRateArray1,
                "sales_amount" => "$salesAmountDate1",
                "average_cart" => "$averageCarteDate1",
                "booking_amount" => "$bookingAmountDate1",

            ],
            "date_2" => [
                "average_checkin_time" => $diffInDaysCheckinDate2,
                "average_reception_time" => $diffInMinsReceptionDate2,
                "occupation_rate" => $occupiedRateDate2,
                "fill_rate" => $fillRateArray2,
                "sales_amount" => "$salesAmountDate2",
                "average_cart" => "$averageCarteDate2",
                "booking_amount" => "$bookingAmountDate2",
            ]
        ]);
    }
}
