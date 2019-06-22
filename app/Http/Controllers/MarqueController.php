<?php

namespace App\Http\Controllers;

use App\CarAgency;
use App\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search=$request->search;
        $marqueCar=Marque::where('nom_marque','LIKE',"%$search%")->paginate(5);
        return response()->json($marqueCar);
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

            'id_marque' => 'required|integer',
            'nom_marque' => 'required|string|min:3'
        ]);

        $marqueCar=new Marque([
            'id_marque'=>
                $request->get('id_marque'),
            'nom_marque'=>$request->get('nom_marque'),
        ]);
        $marqueCar->save();
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
        $marque=Marque::find($id);
        return response()->json($marque);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marque=Marque::find($id);
        return response()->json($marque);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {


        $this->validate(request(), [

            'id_marque' => 'required|integer',
            'nom_marque' => 'required|string|min:4'
        ]);

        $marque=Marque::find($id);
        $marque->update($request->all());
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
        $marqueCar=Marque::find($id);
        $marqueCar->delete();
        return response()->json('succusfully deleted');
    }
}
