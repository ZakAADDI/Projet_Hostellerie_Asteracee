<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BookingRepository;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookingsDatas(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'starting_date' => 'required|max:25',
            'ending_date' => 'required|max:25',
        ]);
        $coucou = $request->starting_date;
        return response()->json($coucou);
        // temps moyen résa - checkin
        // $periodBetweenBookingAndCheckin = BookingRepository::getPeriodBookingAndCheckin($request->starting_date, $request->ending_date,);

        // temps moyen checkin -enter room

        // % occupation période

        // nbr par type de chambre

        // nbr par type d'options

        // Panier moyen évolution (tendance vers haut ou bas)

        // Panier moyen actuel

        // chiffre d'affaires

        // nbr de résea

        // return $periodBetweenBookingAndCheckin;
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
