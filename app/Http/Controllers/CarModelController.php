<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\Marque;
use Illuminate\Http\Request;

class CarModelController extends Controller
{


    public function getModelByMarque($id)
    {

        $modelsCar=Marque::find($id)->models;
        return response()->json($modelsCar);
    }


    public function modelmarque($id)
    {

            $modelsCar=CarModel::where('marque_id',$id)->get();
             return response()->json($modelsCar);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelsCar=CarModel::with('marqueModel')->orderBy('id','desc')->paginate(3);
        return response()->json($modelsCar);
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

            'id_model' => 'required|integer',
             'nom_model' => 'required|string'
        ]);

            $modelCar=new CarModel([
            'id_model'=>$request->get('id_model'),
            'nom_model'=>$request->get('nom_model'),
            'marque_id'=>$request->get('marque_id'),
        ]);
        $modelCar->save();
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
        $carmodel=CarModel::find($id);
        return response()->json($carmodel);
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
        $carmodel=CarModel::find($id);
        $carmodel->update($request->all());
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
        $modelsCar=CarModel::find($id);
        $modelsCar->delete();
        return response()->json('succusfully deleted');
    }
}
