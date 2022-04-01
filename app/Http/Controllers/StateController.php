<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Selled;
use App\Models\Car;
use App\Models\car_model;
use App\Models\voiture;
use Illuminate\Support\Facades\Auth;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $marques = voiture::select('model', \DB::raw('count(*) as total'))
                 ->groupBy('model')
                 ->orderBy('total','desc')
                 ->paginate(43);
        return view('check',compact('marques'));
        
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
            'prix' => 'required',
            
            'couleur' => 'required',
            
        ],
    [
        'brands.required' => 'Vous devez choisir une marque',
            'model.required' => 'Vous devez choisir un model', 
            'serie.required' => 'Vous devez choisir la serie',
            'matricule.required' => 'Vous devez choisir une année', 
            'energie.required' => "Vous devez choisir le type d'energie",
            'kilomitrage.required' => 'Vous devez entrer le kilomitrage', 
            'trans.required' => 'Vous devez choisir le type de transmission',
            'location.required' => 'Vous devez entrer le prix',
            'prix.required' => 'Vous devez choisir le type de vehicule', 
           
            'trans.couleur' => 'Vous devez choisir la couleur',
            
    ]);
          $marque=$request->brands; 
          $model=$request->model;
          $notes=$request->serie;
          $proDate=(int)$request->matricule;
          $couleur=$request->couleur;
          $energie=$request->energie;
          $kilometrage=$request->kilomitrage;
          $transmission=$request->trans;
          $prix=$request->prix;
          $kilometrage=$request->kilomitrage;
          $taux=38;
          return view('state',compact('marque','model','notes','proDate','couleur','energie','kilometrage','transmission','prix','taux'));

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
}
