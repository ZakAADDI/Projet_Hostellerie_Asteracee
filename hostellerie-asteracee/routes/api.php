<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\DealController;
use App\Http\Controllers\API\HeroController;
use App\Http\Controllers\API\InfoController;
use App\Http\Controllers\API\MediaController;
use App\Http\Controllers\API\OptionController;
use App\Http\Controllers\API\PrestationController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\RoomsPrestationController;
use App\Http\Controllers\API\RoomTypeController;
use App\Http\Controllers\API\SectionController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\UserController;
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
// -------------------  Protected Endpoints  --------------------------- //


//Add MiddlWare to translate through the header which is full filled thanks to the localstorage into /localStorageProvider.js
Route::group(['middleware' => ['AcceptLanguage']], function () {


Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    // ROOMS
    Route::post('/rooms',[RoomController::class,'store']);
    Route::patch('/rooms/{id}',[RoomController::class,'update']);
    Route::delete('/rooms/{id}',[RoomController::class,'destroy']);

    // REVIEWS
    Route::post('/reviews',[ReviewController::class,'store']);
    Route::patch('/reviews/{id}',[ReviewController::class,'update']);
    Route::delete('/reviews/{id}',[ReviewController::class,'destroy']);

    // HEROES
    Route::patch('/heroes',[HeroController::class,'update']);

    // CONTACTS
    Route::patch('/contacts/{id}',[ContactController::class,'update']);

    // MEDIAS
    Route::post('/medias',[MediaController::class,'store']);
    Route::patch('/medias/{id}',[MediaController::class,'update']);
    Route::delete('/medias/{id}',[MediaController::class,'destroy']);

    // INFOS
    Route::post('/infos',[InfoController::class,'store']);
    Route::patch('/infos/{id}',[InfoController::class,'update']);
    Route::delete('/infos/{id}',[InfoController::class,'destroy']);

    // SERVICES
    Route::post('/services',[ServiceController::class,'store']);
    Route::patch('/services/{id}',[ServiceController::class,'update']);
    Route::delete('/services/{id}',[ServiceController::class,'destroy']);

    // DEALS
    Route::post('/deals',[DealController::class,'store']);
    Route::patch('/deals/{id}',[DealController::class,'update']);
    Route::delete('/deals/{id}',[DealController::class,'destroy']);

    // USERS
    Route::get('/users',[UserController::class,'index']);
    Route::get('/users/{id}',[UserController::class,'show']);
    Route::patch('/users/{id}',[UserController::class,'update']);
    Route::delete('/users/{id}',[UserController::class,'destroy']);

    // BOOKINGS
    Route::post('/bookings',[BookingController::class,'store']);
    Route::patch('/bookings/{id}',[BookingController::class,'update']);
    Route::delete('/bookings/{id}',[BookingController::class,'destroy']);


// Sections
    Route::post('/sections',[\App\Http\Controllers\API\SectionController::class,'store']);
    Route::patch('/sections/{id}',[\App\Http\Controllers\API\SectionController::class,'update']);
 });

 // ROOMSPRESTATION
 Route::post('/roomsPrestations',[\App\Http\Controllers\API\RoomsPrestationController::class,'store']);

// -----------------------  Public Endpoints  ---------------------------- //

// SANCTUM
Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);

// ROOMS
Route::get('/rooms', [RoomController::class,'index']);
Route::get('/rooms/{id}', [RoomController::class,'show']);

// REVIEWS
Route::get('/reviews', [ReviewController::class,'index']);
Route::get('/reviews/{id}', [ReviewController::class,'show']);

// HEROES
Route::get('/heroes', [HeroController::class,'index']);

// CONTACTS
Route::get('/contacts', [ContactController::class,'index']);
Route::get('/contacts/{id}', [ContactController::class,'show']);

// MEDIAS
Route::get('/medias', [MediaController::class,'index']);
Route::get('/medias/{id}', [MediaController::class,'show']);

// INFOS
Route::get('/infos', [InfoController::class,'index']);
Route::get('/infos/{id}', [InfoController::class,'show']);

// SERVICES
Route::get('/services', [ServiceController::class,'index']);
Route::get('/services/{id}', [ServiceController::class,'show']);


// DEALS
Route::get('/deals', [DealController::class,'index']);
Route::get('/deals/{id}', [DealController::class,'show']);
Route::get('/sortedDeals', [DealController::class, 'showSorted']);

// BOOKING
    Route::get('/bookings', [BookingController::class,'index']);
    Route::get('/bookings/{id}', [BookingController::class,'show']);

// Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/services/{id}', [ServiceController::class,'show']);
// });

// Sections
Route::get('/sections', [SectionController::class,'index']);
Route::get('/sections/{id}', [SectionController::class,'show']);

// PRESTATIONS
Route::get('/prestations', [PrestationController::class,'index']);
Route::get('/prestations/{id}', [PrestationController::class,'show']);

// ROOMTYPES
Route::get('/roomTypes', [RoomTypeController::class,'index']);
Route::get('/roomTypes/{id}', [RoomTypeController::class,'show']);

// OPTIONS
Route::get('/options', [OptionController::class,'index']);
Route::get('/options/{id}', [OptionController::class,'show']);

// ROOMSPRESTATIONS
Route::get('/roomsPrestations', [RoomsPrestationController::class,'index']);
Route::get('/roomsPrestations/{id}', [RoomsPrestationController::class,'show']);
});
