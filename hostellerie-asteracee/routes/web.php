<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get("simple-qrcode", [\App\Http\Controllers\SimpleQRcodeController::class,'generate']);

Route::get('send-booking-recap', [App\Http\Controllers\EmailController::class, 'sendBookingRecap']);
