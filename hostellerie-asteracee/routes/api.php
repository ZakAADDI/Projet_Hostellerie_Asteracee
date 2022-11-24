<?php

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

// ROOMS
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::post('/rooms',[\App\Http\Controllers\API\RoomController::class,'store']);
    Route::patch('/rooms/{id}',[\App\Http\Controllers\API\RoomController::class,'update']);
    Route::delete('/rooms/{id}',[\App\Http\Controllers\API\RoomController::class,'destroy']);
});

// REVIEWS
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::post('/reviews',[\App\Http\Controllers\API\ReviewController::class,'store']);
    Route::patch('/reviews/{id}',[\App\Http\Controllers\API\ReviewController::class,'update']);
    Route::delete('/reviews/{id}',[\App\Http\Controllers\API\ReviewController::class,'destroy']);
});

// HEROES
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::patch('/heroes',[\App\Http\Controllers\API\HeroController::class,'update']);
});

// CONTACTS
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::patch('/contacts/{id}',[\App\Http\Controllers\API\ContactController::class,'update']);
});

// MEDIAS
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::post('/medias',[\App\Http\Controllers\API\MediaController::class,'store']);
    Route::patch('/medias/{id}',[\App\Http\Controllers\API\MediaController::class,'update']);
    Route::delete('/medias/{id}',[\App\Http\Controllers\API\MediaController::class,'destroy']);
});

// INFOS
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::post('/infos',[\App\Http\Controllers\API\InfoController::class,'store']);
    Route::patch('/infos/{id}',[\App\Http\Controllers\API\InfoController::class,'update']);
    Route::delete('/infos/{id}',[\App\Http\Controllers\API\InfoController::class,'destroy']);
});

// SERVICES
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::post('/services',[\App\Http\Controllers\API\ServiceController::class,'store']);
    Route::patch('/services/{id}',[\App\Http\Controllers\API\ServiceController::class,'update']);
    Route::delete('/services/{id}',[\App\Http\Controllers\API\ServiceController::class,'destroy']);
});

// DEALS
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::post('/deals',[\App\Http\Controllers\API\DealController::class,'store']);
    Route::patch('/deals/{id}',[\App\Http\Controllers\API\DealController::class,'update']);
    Route::delete('/deals/{id}',[\App\Http\Controllers\API\DealController::class,'destroy']);
});

// USERS
Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
    Route::get('/users',[\App\Http\Controllers\API\UserController::class,'index']);
    Route::get('/users/{id}',[\App\Http\Controllers\API\UserController::class,'show']);
    Route::patch('/users/{id}',[\App\Http\Controllers\API\UserController::class,'update']);
    Route::delete('/users/{id}',[\App\Http\Controllers\API\UserController::class,'destroy']);
});


// -----------------------  Public Endpoints  ---------------------------- //
// SANCTUM
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'createUser']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'loginUser']);

// ROOMS

Route::get('/rooms', [\App\Http\Controllers\API\RoomController::class,'index']);
Route::get('/rooms/{id}', [\App\Http\Controllers\API\RoomController::class,'show']);


// REVIEWS
Route::get('/reviews', [\App\Http\Controllers\API\ReviewController::class,'index']);
Route::get('/reviews/{id}', [\App\Http\Controllers\API\ReviewController::class,'show']);

// HEROES
Route::get('/heroes', [\App\Http\Controllers\API\HeroController::class,'index']);

// CONTACTS
Route::get('/contacts', [\App\Http\Controllers\API\ContactController::class,'index']);

// MEDIAS
Route::get('/medias', [\App\Http\Controllers\API\MediaController::class,'index']);
Route::get('/medias/{id}', [\App\Http\Controllers\API\MediaController::class,'show']);

// INFOS
Route::get('/infos', [\App\Http\Controllers\API\InfoController::class,'index']);
Route::get('/infos/{id}', [\App\Http\Controllers\API\InfoController::class,'show']);

// SERVICES
Route::get('/services', [\App\Http\Controllers\API\ServiceController::class,'index']);
Route::get('/services/{id}', [\App\Http\Controllers\API\ServiceController::class,'show']);

// DEALS
Route::get('/deals', [\App\Http\Controllers\API\DealController::class,'index']);
Route::get('/deals/{id}', [\App\Http\Controllers\API\DealController::class,'show']);
Route::get('/sortedDeals', [\App\Http\Controllers\API\DealController::class, 'showSorted']);
});

