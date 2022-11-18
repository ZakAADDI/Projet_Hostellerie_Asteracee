<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("heroes",\App\Http\Controllers\API\HeroController::class);
Route::apiResource("medias",\App\Http\Controllers\API\MediaController::class);
Route::apiResource("infos",\App\Http\Controllers\API\InfoController::class);
Route::apiResource("reviews",\App\Http\Controllers\API\ReviewController::class);
Route::apiResource("rooms",\App\Http\Controllers\API\RoomController::class);
Route::apiResource("services",\App\Http\Controllers\API\ServiceController::class);
Route::apiResource("contacts",\App\Http\Controllers\API\ContactController::class);
Route::apiResource("deals",\App\Http\Controllers\API\DealController::class);
Route::get("sortedDeals", [\App\Http\Controllers\API\DealController::class, 'showSorted']);
