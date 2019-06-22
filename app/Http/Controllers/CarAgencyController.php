<?php

namespace App\Http\Controllers;

use App\CarAgency;
use App\Marque;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CarAgencyController extends Controller
{

    public function test($id){

        $cars=Marque::find($id)->cars;
        return $cars;

    }
    public function getName(){

//        $cars=CarAgency::find(1);
//        return $cars;

        $marque = CarAgency::findOrFail(1)->marques;
        return $marque;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->search;
        $voitureagences = CarAgency::where('v_matricule','LIKE',"%$search%")->with('marques')->orderBy('id','desc')->paginate(5);
        //$voitureagencses=CarAgency::orderBy("id")->paginate(3);

        return response()->json($voitureagences);
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

            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'v_matricule' => 'required|integer',
            'kilometrage' => 'required|integer',
            'prix' => 'required|integer',
            'disponibilite' => 'required|string',
            'couleur' => 'required|string',
            'description' => 'required|string',

        ]);

        $fileName = null;
        if (request()->hasFile('photo')) {
            $file = request()->file('photo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./images', $fileName);
        }


        /*  $voitureagence=new VoitureAgence([
              'v_matricule'=>$request->get('v_matricule'),
              'kilometrage'=>$request->get('kilometrage'),
              'couleur'=>$request->get('couleur'),
              'prix'=>$request->get('prix'),
              'photo'=>$request->$fileName,
              'disponibilite'=>$request->get('disponibilite'),


          ]);          $voitureagence->save(); */

        $voitureagence= new CarAgency();
        $voitureagence->v_matricule = $request->v_matricule;
        $voitureagence->kilometrage = $request->kilometrage;
        $voitureagence->couleur = $request->couleur;
        $voitureagence->prix = $request->prix;
        $voitureagence->marque_id = $request->marque_id;
       //w $voitureagence->marques();
        $voitureagence->photo = $fileName;
        $voitureagence->disponibilite = $request->disponibilite;
        $voitureagence->description = $request->description;

        $voitureagence->save();

        return response()->json('successfuly stored');

    }

    public function storeMultipleImage(Request $request)
    {
        try {
            $this->validate(request(), [

                'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
                'v_matricule' => 'required|integer',
                'kilometrage' => 'required|integer',
                'prix' => 'required|integer',
                'disponibilite' => 'required|string',
                'couleur' => 'required|string',
                'description' => 'required|string',

            ]);
        } catch (ValidationException $e) {
        }
        $fileName = null;
        if (request()->hasFile('photo')) {
           // $file = request()->file('photo');
            foreach($request->file('photo') as $file){
           // foreach ($files as $file){
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./images', $fileName);
            }
        }
        $voitureagence= new CarAgency();
        $voitureagence->v_matricule = $request->v_matricule;
        $voitureagence->kilometrage = $request->kilometrage;
        $voitureagence->couleur = $request->couleur;
        $voitureagence->prix = $request->prix;
        $voitureagence->marque_id = $request->marque_id;
        //w $voitureagence->marques();
        $voitureagence->photo = $fileName;
        $voitureagence->disponibilite = $request->disponibilite;
        $voitureagence->description = $request->description;
        $voitureagence->save();
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

        $voitureagence=CarAgency::with('marques')->orderBy('id','desc')->find($id);
        return response()->json($voitureagence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voitureagence=CarAgency::find($id);
        return response()->json($voitureagence);
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

        $this->validate(request(),[

           // 'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'v_matricule' => 'required|integer',
            'kilometrage' => 'required|integer',
            'prix' => 'required|integer',
            'disponibilite' => 'required|string',
            'couleur' => 'required|string',
            'description' => 'required|string'

        ]);
        $voitureagence=CarAgency::find($id);
        $voitureagence->update($request->all());
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
        $voitureagence=CarAgency::find($id);
        $voitureagence->delete();
        return response()->json('succusfully deleted');
    }
}
