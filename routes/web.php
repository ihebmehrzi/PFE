<?php

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

use App\User;

Route::get('/', function () {
    return view('Client');


});


//Route::get('/getmarq','CarAgencyController@test');
Route::get('/getName','CarAgencyController@getName');
Route::get('/getModel/{id}','CarModelController@getModelByMarque');


Route::get('/getmarq/{id}','CarAgencyController@test');




Route::get('/Adminn', function () {
    return view('Admin1');
});


//////////////////////////reservation ////////////////////////
///
Route::get('/getReservationById/{id}','ReservationController@getReservationById');
Route::get('/getCarByReservationId/{id}','ReservationController@getCarByReservationId');







Route::get('/home1', 'MailController@home');

Route::post('/send/email', 'MailController@sendMail');

Route::get('/{any}', function () {
    return view('Admin1');
})->where('any', '.*');


Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    if($q != ""){
        $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
        $pagination = $user->appends ( array (
            'q' => Input::get ( 'q' )
        ) );
        if (count ( $user ) > 0)
            return view ( 'Admin1' )->withDetails ( $user )->withQuery ( $q );
    }
    return view ( 'Admin1' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::get('/blade', function () {
    return view('test');
});
