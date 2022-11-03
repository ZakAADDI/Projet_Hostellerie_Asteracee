<?php

use Illuminate\Support\Facades\Route;

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

/* Hero */

Route::get('/heros');
Route::put('/heros');

/* Users */

Route::post('/users');
Route::get('/users');
Route::get('/users/{id}');
Route::put('/users/{id}');
Route::delete('/users/{id}');

/* Rooms */

Route::post('/rooms');
Route::get('/rooms');
Route::put('/rooms/{id}');
Route::delete('/rooms/{id}');

/* Services */

Route::post('/services');
Route::get('/services');
Route::get('/services/{id}');
Route::put('/services/{id}');
Route::delete('/services/{id}');

/* News */

/* Deals */

/* Reviews */

/* Contacts */

/* Medias */

/* Socials */

Route::post('/services', [ServiceController::findAll()]);
Route::post('/news', [NewsController::findAll()]);
Route::post('/medias', [MediaController::findAll()]);
Route::post('/socials', [SocialController::findAll()]);
Route::post('/reviews', [ReviewController::findAll()]);
Route::post('/contacts', [ContactController::findAll()]);
Route::post('/deals', [DealController::findAll()]);

Route::get('/', [HomeController::findAll()]);
Route::get('/rooms/{id}', [RoomsController::findAll()]);
Route::get('/services', [ServicesController::findAll()]);
Route::get('/services/{id}', [ServicesController::findAll()]);
Route::get('/news', [NewsController::findAll()]);
Route::get('/news/{id}', [NewsController::findAll()]);
Route::get('/medias', [MediasController::findAll()]);
Route::get('/medias/{id}', [MediasController::findAll()]);
Route::get('/socials', [SocialsController::findAll()]);
Route::get('/socials/{id}', [SocialsController::findAll()]);
Route::get('/reviews', [ReviewsController::findAll()]);
Route::get('/reviews/{id}', [ReviewsController::findAll()]);
Route::get('/contacts', [ContactsController::findAll()]);
Route::get('/contacts/{id}', [ContactsController::findAll()]);
Route::get('/heros', [HerosController::findAll()]);
Route::get('/deals', [DealsController::findAll()]);
Route::get('/deals/{id}', [DealsController::findAll()]);
