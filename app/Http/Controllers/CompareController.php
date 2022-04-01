<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voiture;
use App\Models\car_model;
use App\Models\car_make;
use Illuminate\Support\Facades\Http;
class CompareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marques = voiture::select('brand')->distinct()->get();
//eturn view('compare',compact('marques'));

return $marques;
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
        $brand1=$request->vehicule1;
        $brand2=$request->vehicule2;
        $model1=$request-model1;
        $model2=$request->model2;
        return $model1;
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
     $models=\DB::table('car_model')->where('id_car_make',$id)->pluck('name','id_car_model');
     return json_encode($models);
       }
}
