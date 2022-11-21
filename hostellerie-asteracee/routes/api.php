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
// ROOMS
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/rooms',[\App\Http\Controllers\API\RoomController::class,'store']);
    Route::patch('/rooms/{id}',[\App\Http\Controllers\API\RoomController::class,'update']);
    Route::delete('/rooms/{id}',[\App\Http\Controllers\API\RoomController::class,'destroy']);
});

// REVIEWS
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/reviews',[\App\Http\Controllers\API\ReviewController::class,'store']);
    Route::patch('/reviews/{id}',[\App\Http\Controllers\API\ReviewController::class,'update']);
    Route::delete('/reviews/{id}',[\App\Http\Controllers\API\ReviewController::class,'destroy']);
});

// HEROES
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::patch('/heroes',[\App\Http\Controllers\API\HeroController::class,'update']);
});

// CONTACTS
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::patch('/contacts/{id}',[\App\Http\Controllers\API\ContactController::class,'update']);
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




// Route::apiResource("contacts",\App\Http\Controllers\API\ContactController::class);
// Route::apiResource("reviews",\App\Http\Controllers\API\ReviewController::class);
// Route::apiResource("rooms",\App\Http\Controllers\API\RoomController::class);
// Route::apiResource("heroes",\App\Http\Controllers\API\HeroController::class);
Route::apiResource("medias",\App\Http\Controllers\API\MediaController::class);
Route::apiResource("infos",\App\Http\Controllers\API\InfoController::class);
Route::apiResource("services",\App\Http\Controllers\API\ServiceController::class);
Route::apiResource("deals",\App\Http\Controllers\API\DealController::class);
Route::apiResource("users",\App\Http\Controllers\API\UserController::class);




