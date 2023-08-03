<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
    public function getEfficiencyDatas()
    {
        return 'getEfficiencyDatas';
    }
}
