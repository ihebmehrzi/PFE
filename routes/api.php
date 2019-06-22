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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/cars','CarAgencyController');
Route::resource('/modelCars','CarModelController');
Route::resource('/marque','MarqueController');
Route::resource('/category','CategoryController');
Route::resource('/reservations','ReservationController');
Route::resource('/maintenances','MaintenanceController');


Route::resource('/contact','ContactController');

Route::post('/store','CarAgencyController@storeMultipleImage');

Route::get('/model/{id}','CarModelController@modelmarque');



Route::post('sendMail', 'MailController@sendMail');

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
//Route::post(‘logout’, ‘AuthController@logout’);
//Route::post(‘refresh’, ‘AuthController@refresh’);
//Route::post(‘me’, ‘AuthController@me’);
});

//
//Route::group([
//    'prefix' => 'auth',
//], function () {
//    Route::post('login', 'AuthController@login');
//    Route::post('register', 'AuthController@signup');
//    Route::post('userProfile/{id}', 'UserController@updateProfile');
//    Route::get('usersh/{id}', 'UserController@show');
//
//    Route::group([
//        'middleware' => 'auth:api',
//    ], function () {
//        Route::get('logout', 'AuthController@logout');
//        Route::get('user', 'AuthController@user');
//    });
//});
