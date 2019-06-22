<?php

namespace App\Http\Controllers;

use App\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenancesCar=Maintenance::orderBy("id")->paginate(5);
        return response()->json($maintenancesCar);
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
        $this->validate(request(), [

            'id_maintenance' => 'required|integer',
            'desc_maintenance' => 'required',
            'date_deb_maintenance' => 'required',
            'date_fin_maintenance' => 'required',
            'montant_maintenance' => 'required',

        ]);

        $maintenanceCar=new Maintenance([
            'id_maintenance'=>$request->get('id_maintenance'),
            'desc_maintenance'=>$request->get('desc_maintenance'),
            'date_deb_maintenance'=>$request->get('date_deb_maintenance'),
            'date_fin_maintenance'=>$request->get('date_fin_maintenance'),
            'montant_maintenance'=>$request->get('montant_maintenance'),
        ]);
        $maintenanceCar->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenanceCar=Maintenance::find($id);
        return response()->json($maintenanceCar);
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
        $maintenanceCar=Maintenance::find($id);
        $maintenanceCar->update($request->all());
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
        $maintenancesCar=Maintenance::find($id);
        $maintenancesCar->delete();
        return response()->json('succusfully deleted');
    }
}
