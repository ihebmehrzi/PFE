<?php

namespace App\Http\Controllers;

use App\CarAgency;
use App\Client;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{



    public function getReservationById($id){
        $reservation=Client::find($id)->reservation;
        return  $reservation;

    }

    public function getCarByReservationId($id){
        $car=CarAgency::find($id)->reservations;
        return  $car;

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $reservations = Reservation::with('cars')->orderBy('id','desc')->paginate(5);

      //  $reservations=Reservation::all();
        return response()->json($reservations);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate(request(),[

            'nom' => 'required|string|min:3',
            'prenom' => 'required|min:3',
            'date_pris_en_charge' => 'required',
            'date_fin_reservation' => 'required',
            'tel' => 'required|numeric',
            'email' => 'required|email',


        ]);
        $reservation=new Reservation([
            'nom'=>$request->get('nom'),
            'prenom'=>$request->get('prenom'),
            'date_pris_en_charge'=>$request->get('date_pris_en_charge'),
            'date_fin_reservation'=>$request->get('date_fin_reservation'),
            'tel'=>$request->get('tel'),
            'email'=>$request->get('email'),
            'client_id'=>$request->get('client_id'),
            'car_id'=>$request->get('car_id'),
        ]);
        $reservation->save();
        return response()->json('successfuly stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation=Reservation::find($id);
        return response()->json($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation=Reservation::find($id);
        return response()->json($reservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservation=Reservation::find($id);
        $reservation->update($request->all());
        return response()->json('succusfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation=Reservation::find($id);
        $reservation->delete();
        return response()->json('succusfully deleted');
    }


}
