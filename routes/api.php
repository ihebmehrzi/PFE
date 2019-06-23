<?php

use Illuminate\Http\Request;

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


Route::resource('/cars', 'CarAgencyController');
Route::resource('/modelCars', 'CarModelController');
Route::resource('/marque', 'MarqueController');
Route::resource('/category', 'CategoryController');
Route::resource('/reservations', 'ReservationController');
Route::resource('/maintenances', 'MaintenanceController');

Route::resource('/contact', 'ContactController');

Route::post('/store', 'CarAgencyController@storeMultipleImage');

Route::get('/model/{id}', 'CarModelController@modelmarque');

Route::post('sendMail', 'MailController@sendMail');


Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('signup', 'Auth\LoginController@signup');

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('logout', 'Auth\LoginController@logout');
        Route::get('user', 'Auth\LoginController@user');
    });
});
