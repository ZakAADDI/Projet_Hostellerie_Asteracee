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

        //! nbr par type de chambre
        $roomsByType = BookingRepository::getRoomsByType($from, $to);
        $datas['roomsByType'] = $roomsByType;

        //OK nbr par type d'options
        $optionsByType = BookingRepository::getOptionsByType($from, $to);
        $datas['optionsByType'] = $optionsByType;

        //! Panier moyen évolution (tendance vers haut ou bas)
        $trendAverageBasketAmount = BookingRepository::getTrendAverageBasketAmount($from,$to);
        $datas['trendAverageBasketAmount'] = $trendAverageBasketAmount;

        //OK Panier moyen actuel
        $currentAverageBasketAmount = BookingRepository::getCurrentAverageBasketAmount($now);
        $datas['currentAverageBasketAmount'] = $currentAverageBasketAmount;

        //OK chiffre d'affaires
        $revenuesInPeriod = BookingRepository::getRevenuesInPeriod($from,$to);
        $datas['revenuesInPeriod'] = $revenuesInPeriod;

        //OK nbr de résea
        $nbrOfBookingsInPeriod = BookingRepository::getNbrOfBookinsInPeriod($from,$to);
        $datas['nbrOfBookingsInPeriod'] = $nbrOfBookingsInPeriod;

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
