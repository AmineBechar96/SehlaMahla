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
use Illuminate\Support\Facades\Auth;
class Stati2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        if(Auth::user()->hasVerifiedEmail()){
        $count=voiture::all()->count();
$ch_stat=voiture::select(\DB::raw('(CASE WHEN ch BETWEEN 0 AND 60 THEN "0-60"
WHEN ch BETWEEN 61 AND 90 THEN "61-90"
WHEN ch BETWEEN 91 AND 120 THEN "91-120"
WHEN ch BETWEEN 121 AND 150 THEN "121-150"
WHEN ch BETWEEN 151 AND 180 THEN "151-180"
WHEN ch BETWEEN 181 AND 210 THEN "181-210"
ELSE "autres" END)  AS rang'), \DB::raw('count(1) as count'))
->groupBy('rang')
->orderBy('count','desc')
->get();
$data = [];
 
 foreach($ch_stat as $model) {
$data['label'][] = $model->rang;
$data['data'][] = $model->count;
         }
 $data['chart_data'] = json_encode($data);


 $colors = voiture::select('couleur', \DB::raw('count(couleur) as best'), )
 ->groupBy('couleur')
 ->orderBy('best','desc')
 ->paginate(6);
 $data2 = [];
 
 foreach($colors as $model) {
$data2['label'][] = $model->couleur;
$data2['data'][] = $model->best;
         }
 $data2['chart_data2'] = json_encode($data2);

 $energie = voiture::select('energie', \DB::raw('count(energie) as best'), )
 ->groupBy('energie')
 ->orderBy('best','desc')
 ->paginate(6);
 $data3 = [];
 
 foreach($energie as $model) {
$data3['label'][] = $model->energie;
$data3['data'][] =  round(($model->best*100)/$count);
         }
 $data3['chart_data3'] = json_encode($data3);

 $type = voiture::select('type', \DB::raw('count(type) as best'), )
 ->groupBy('type')
 ->orderBy('best','desc')
 ->paginate(8);
 $data4 = [];
 
 foreach($type as $model) {
$data4['label'][] = $model->type;
$data4['data'][] =  round(($model->best*100)/$count);
         }
 $data4['chart_data4'] = json_encode($data4);
 $litre = voiture::select('litre', \DB::raw('count(litre) as best'), )
 ->groupBy('litre')
 ->orderBy('best','desc')
 ->paginate(10);
 $data5 = [];
 
 foreach($litre as $model) {
$data5['label'][] = $model->litre."L";
$data5['data'][] =  round(($model->best*100)/$count);
         }
 $data5['chart_data5'] = json_encode($data5);
 $tdi = voiture::select('tdi', \DB::raw('count(tdi) as best'), )
 ->groupBy('tdi')
 ->orderBy('best','desc')
 ->paginate(8);
 $data6 = [];
 
 foreach($tdi as $model) {
$data6['label'][] = $model->tdi;
$data6['data'][] =  round(($model->best*100)/$count);
         }
 $data6['chart_data6'] = json_encode($data6);

 $proDate = voiture::select('proDate', \DB::raw('count(proDate) as best'), )
 ->groupBy('proDate')
 ->orderBy('proDate','desc')
 ->paginate(12);
 $data7 = [];
 
 foreach($proDate as $model) {
$data7['label'][] ="'.$model->proDate.'";
$data7['data'][] =  round(($model->best*100)/$count);
         }
 $data7['chart_data7'] = json_encode($data7);

        return view('features',compact('data','data2','data3','data4','data5','data6','data7'));
    }
    else{
        return redirect('email/verify');
    }
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
        //
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
