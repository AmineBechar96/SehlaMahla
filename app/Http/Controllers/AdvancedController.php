<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\car_make;
use App\Models\car_model;
use App\Models\car_serie;
use App\Models\voiture;
use App\Models\voiture2;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class AdvancedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //$marques=voiture::all();
     $marques = voiture::select('model', \DB::raw('count(*) as total'))
     ->groupBy('model')
     ->orderBy('total','desc')
     ->paginate(43);
return view('advanced',compact('marques'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brands' => 'required',
            'model' => 'required', 
            'serie' => 'required',
            'matricule' => 'required', 
            'energie' => 'required',
            'kilomitrage' => 'required', 
            'trans' => 'required',
            'location' => 'required',
            'type' => 'required',
            'tdi' => 'required', 
            'litre' => 'required',
            'couleur' => 'required',
            'ch' => 'required',
        ],
    [
        'brands.required' => 'Vous devez choisir une marque',
            'model.required' => 'Vous devez choisir un model', 
            'serie.required' => 'Vous devez choisir la serie',
            'matricule.required' => 'Vous devez choisir une année', 
            'energie.required' => "Vous devez choisir le type d'energie",
            'kilomitrage.required' => 'Vous devez entrer le kilomitrage', 
            'trans.required' => 'Vous devez choisir le type de transmission',
            'location.required' => 'Vous devez choisir la localisation',
            'type.required' => 'Vous devez choisir le type de vehicule', 
            'tdi.required' => "Vous devez choisir le type de moteur",
            'litre.required' => 'Vous devez entrer le volume de moteur', 
            'trans.couleur' => 'Vous devez choisir la couleur',
            'location.ch' => 'Vous devez entrer le nombre de chevaux',
    ]);
        $marque=$request->brands;
       
        
        $model=$request->model;
          $notes=$request->serie;
          $proDate=(int)$request->matricule;
         $type=$request->type;
          $energie=$request->energie;
          $kilometrage=(int)$request->kilomitrage;
          $transmission=$request->trans;
         $couleur=$request->couleur;
          $tdi=$request->tdi;
          $location=$request->location;
          $ch=(int)$request->ch;
         $litre=$request->litre;
          

$response = Http::post('https://calculateur-prix2.herokuapp.com/', [
  'model' => $marque,
  'brand' => $model,
  'notes' => $notes,
  'types' =>$type,
  'tdi'=>$tdi,
 'location' =>$location,
  'ch' => $ch,
  'proDate' => $proDate,
  'transmission' => $transmission,
  'couleur'=>$couleur,
'energie'=> $energie,
'litre' => $litre,
  'kilometrage' => $kilometrage,

])->throw()->json();
\Session::put('car', ['brand'=>$marque,'response'=>$response]);  
          
        
        return redirect()->route('estimation');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getmodel($id){
        //  $models=\DB::table('car_model')->where('id_car_make',$id)->pluck('name','id_car_model');
           //return json_encode($models);
          // $models=\DB::table('voitures')->where('model',$id)->pluck('brand','id');
             //$models=voiture::where('model',$id)->distinct()->pluck('brand','id');
             $models=voiture::select('brand', \DB::raw('count(*) as total'))->where('model',$id)
           ->groupBy('brand')
           ->orderBy('total','desc')
           ->get()->pluck('total','brand');
           return json_encode($models);
       }
       public function getserie($id){
        $series=voiture::select('notes', \DB::raw('count(*) as total'))->where('brand',$id)
        ->groupBy('notes')
        ->orderBy('total','desc')
        ->get()->pluck('total','notes');
        return json_encode($series);
    }
}
