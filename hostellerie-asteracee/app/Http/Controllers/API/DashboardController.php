<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BookingRepository;
use App\Http\Repositories\RoomRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Room;

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

        //! temps moyen résa - checkin
        $timeBetweenBookingAndCheckinInDays = BookingRepository::getPeriodBookingAndCheckinInDays($from, $to);
        $datas['timeBetweenBookingAndCheckinInDays'] = $timeBetweenBookingAndCheckinInDays;

        //! temps moyen checkin -enter room
        $timeBetweenCheckinAndOpenDoor = BookingRepository::getTimeBetweenCheckinAndOpenDoor($from, $to);
        $datas['timeBetweenCheckinAndOpenDorr'] = $timeBetweenCheckinAndOpenDoor;

        //OK % occupation période
        $allRoomsAvailableOnPeriod = count(RoomRepository::getAvailableRooms($from, $to));
        $allRooms = count(Room::all());
        $roomsBooked = $allRooms - $allRoomsAvailableOnPeriod;
        $occupationRate = ($roomsBooked / $allRooms) * 100;
        $datas['occupationOnPeriod'] = round($occupationRate,2);

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
        $prices  = BookingRepository::getCurrentAverageBasketAmount($now);
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
        $datas['revenuesInPeriod'] = round($totalRevenues);

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
    public function getEfficiencyDatas()
    {
        return 'getEfficiencyDatas';
    }
}
