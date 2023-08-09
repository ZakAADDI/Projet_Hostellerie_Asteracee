<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Nfc;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Repositories\RoomRepository;
use App\Http\Repositories\BookingRepository;
use App\Http\Resources\RoomResource;
use App\Http\Repositories\HistoryRepository;

use function PHPUnit\Framework\isEmpty;

class DashboardController extends Controller
{
    /**
     *
     * Display the specified resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDashboardDatas()
    {
        $datas = [];

        // --- Nombres de chambres disponibles --- //
        // Liste des rooms
        $rooms = Room::get()->toArray();
        $rooms_quantity = count($rooms);

        // Liste des bookings occupés
        $bookings = BookingRepository::getCurrentBookings();

        // Nombres de chambres occupées
        $occupied_rooms_quantity = count($bookings);

        // Chambres disponibles
        $available_rooms = $rooms_quantity - $occupied_rooms_quantity;
        $datas['available_rooms'] = $available_rooms;

        // --- Nombres de clés en cours d'utilisation --- //
        $current_nfcs_used = count(Nfc::whereIn('booking_id', $bookings->pluck('id'))->get());
        $datas['nfc_cards_in_use'] = $current_nfcs_used;

        // --- % occupation actuel --- //
        $occupancy_rate = round(($occupied_rooms_quantity / $rooms_quantity * 100), 2);
        $datas['occupancy_rate'] = $occupancy_rate;

        // --- Récupérer les données concernant les chambres --- //
        $rooms = Room::all();
        $allRoomsData = [];

        $roomInUseIds = $bookings->pluck('room_id')->toArray();

        foreach ($rooms as $room) {

            $booking = $bookings->where('room_id', $room->id)->first();
            $customer = ($booking == null ? '-' : ($booking->getUser->lastname . ' ' . $booking->getUser->firstname));
            $booking_ending_date = ($booking == null ? '-' : $booking->ending_date);

            $roomData = [
                'room_number' => $room->room_number,
                'room_type' => $room->getRoomType->name,
                'status' => in_array($room->id, $roomInUseIds) ? 'Occupée' : 'Libre',
                'client' => $customer,
                'available' => $booking_ending_date

            ];
            $allRoomsData[] = $roomData;
        }

        $datas['rooms_informations'] = $allRoomsData;


        return response()->json($datas);
    }

    /**
     *
     * Display the specified resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookingsDatas(Request $request)
    {
        $this->validate($request, [
            'starting_date' => 'required|max:25',
            'ending_date' => 'required|max:25',
        ]);
        $datas = [];
        $from = $request->starting_date;
        $to = $request->ending_date;
        $now = Carbon::today();

        //OK temps moyen résa - checkin
        $timeBetweenBookingAndCheckinInDays = BookingRepository::getPeriodBookingAndCheckinInDays($from, $to);
        $datas['timeBetweenBookingAndCheckinInDays'] = $timeBetweenBookingAndCheckinInDays;

        //OK temps moyen checkin -enter room
        $timeBetweenCheckinAndOpenDoor = BookingRepository::getTimeBetweenCheckinAndOpenDoor($from, $to);
        $datas['timeBetweenCheckinAndOpenDorr'] = $timeBetweenCheckinAndOpenDoor;

        //OK % occupation période
        $bookingsOnPeriod = BookingRepository::getConfirmedBookingOnPeriod($from,$to);

        $daysCounter = 0;
        foreach ($bookingsOnPeriod as $booking) {
            $nbrOfDaysInBookings = Carbon::parse($booking->starting_date)->DiffInDays(Carbon::parse($booking->ending_date));
            $daysCounter += $nbrOfDaysInBookings;
        }
        $nbrOfRooms = count(Room::all());
        $nbrOfDaysInPeriod = Carbon::parse($from)->DiffInDays(Carbon::parse($to));
        $globalNbrOfDaysInPeriodAndRooms = $nbrOfRooms*$nbrOfDaysInPeriod;
        $occupiedRateOnPeriod = count($bookingsOnPeriod) > 0 ? ($daysCounter/$globalNbrOfDaysInPeriodAndRooms)*100 : 0;
        $datas['occupationOnPeriod'] = round($occupiedRateOnPeriod,2);

        //OK nbr par type de chambre
        $roomsByType = BookingRepository::getStatsByType($from, $to,'rooms');
        $datas['roomsByType'] = $roomsByType;

        //OK nbr par type d'options
        $optionsByType = BookingRepository::getStatsByType($from, $to,'options');
        $datas['optionsByType'] = $optionsByType;

        //OK Panier moyen évolution (tendance vers haut ou bas)
        $trendAverageBasketAmount = BookingRepository::getTrendAverageBasketAmount($from,$to);
        $datas['trendAverageBasketAmount'] = $trendAverageBasketAmount;

        //OK Panier moyen actuel
        $prices  = BookingRepository::getCurrentAverageBasketAmount($from,$to);

        $totalAmountOfBookings = 0;
        $nbrOfBookings = count($prices);
        if ($nbrOfBookings != 0) {
            foreach ($prices as $price) {
                $totalAmountOfBookings += $price;
            }
            $averageBasket = $totalAmountOfBookings / $nbrOfBookings;
            $datas['currentAverageBasketAmount'] = round($averageBasket, 2);
        } else {
            $datas['currentAverageBasketAmount'] = 0;
        }

        //OK chiffre d'affaires
        $prices = BookingRepository::getRevenuesInPeriod($from,$to);
        $totalRevenues = 0;
        foreach ($prices as $price) {
            $totalRevenues += $price;
        }
        $datas['revenuesInPeriod'] = round($totalRevenues,2);

        //OK nbr de résea
        $nbrOfBookingsInPeriod = BookingRepository::getNbrOfBookinsInPeriod($from,$to);
        $datas['nbrOfBookingsInPeriod'] = count($nbrOfBookingsInPeriod);

        return response()->json($datas);
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

            $bookingTimeInDays = Carbon::parse($b->starting_date)->floatDiffInDays(Carbon::parse($b->ending_date));
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


        $diffInDaysCheckinDate1 = count($timesInDaysDateChecking1Array)>0 ? strval(round(array_sum($timesInDaysDateChecking1Array)/count($timesInDaysDateChecking1Array))) : '-';
        $diffInDaysCheckinDate2 = count($timesInDaysDateChecking2Array)>0 ? strval(round(array_sum($timesInDaysDateChecking2Array)/count($timesInDaysDateChecking2Array))) : '-';
        $diffInMinsReceptionDate1 = count($timesInMinsDate1ReceptionArray)>0 ? strval(round(array_sum($timesInMinsDate1ReceptionArray)/count($timesInMinsDate1ReceptionArray))) : '-';
        $diffInMinsReceptionDate2 = count($timesInMinsDate2ReceptionArray)>0 ? strval(round(array_sum($timesInMinsDate2ReceptionArray)/count($timesInMinsDate2ReceptionArray))) : '-';
        $occupiedRateDate1 = $globalOccupiedDaysCount1 > 0 ? strval(round(($globalOccupiedDaysCount1/$globalDaysCount1)*100,2)) : "0";
        $occupiedRateDate2 = $globalOccupiedDaysCount2 > 0 ? strval(round(($globalOccupiedDaysCount2/$globalDaysCount2)*100,2)) : "0";
        $salesAmountDate1 = count($salesAmountDate1Array)>0 ? strval(array_sum($salesAmountDate1Array)) : '-';
        $salesAmountDate2 = count($salesAmountDate2Array)>0 ? strval(array_sum($salesAmountDate2Array)) : '-';
        $bookingAmountDate1 = count($bookingsDate1);
        $bookingAmountDate2 = count($bookingsDate2);
        $averageCarteDate1 = $bookingAmountDate1 > 0 ? (array_sum($salesAmountDate1Array))/$bookingAmountDate1 : "-";
        $averageCarteDate2 = $bookingAmountDate2 > 0 ? (array_sum($salesAmountDate2Array))/$bookingAmountDate2 : "-";
        $fillRateArray1 = [
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,1,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,3,1)))/$nbOfRooms)*100),
            round( (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,7,1)))/$nbOfRooms)*100),
            round( (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,10,1)))/$nbOfRooms)*100),
            round(  (count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,14,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,20,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,23,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,25,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y1,$m1,28,1)))/$nbOfRooms)*100),
        ];

        $fillRateArray2 = [
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,1,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,3,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,7,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,10,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,14,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,20,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,23,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,25,1)))/$nbOfRooms)*100),
            round((count(BookingRepository::getConfirmedOngoingBookingsPerDay(Carbon::create($y2,$m2,28,1)))/$nbOfRooms)*100),
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
