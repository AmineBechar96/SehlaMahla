<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\car_make;
use App\Models\car_model;
use App\Models\car_serie;
use App\Models\voiture;
use App\Models\voiture2;
class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("budget");
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
      
        
        $aff_Vehicules=Voiture::select('model','brand','notes','proDate','type','energie','kilometrage','transmission','couleur','ch','tdi','litre',\DB::raw('count(model) as models'),\DB::raw('avg(price) as prix'))
        ->where([
            ['price', '>=',   $request->minprice],
            ['price', '<=', $request->maxprice],
            ['proDate', '>=', $request->minyear],
            ['proDate', '<=', $request->maxyear],
        ])
        ->groupBy('model','brand','notes')
        ->orderBy('models','desc')
        ->paginate(20);
        return view('carList',compact('aff_Vehicules'));
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
