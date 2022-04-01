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
class Stati1Controller extends Controller
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
        $bestmodels = voiture::select('model', \DB::raw('count(*) as best'), )
        ->groupBy('model')
        ->orderBy('best','desc')
        ->paginate(6);
        //return $count;
$datatable=[];
foreach($bestmodels as $model){
    $datatable['models'][]=$model->model;
}

        $data = [];
 
        foreach($bestmodels as $model) {
           $data['label'][] = $model->model;
           $data['data'][] = round(($model->best*100)/$count);
         }
    
       $data['chart_data'] = json_encode($data);


       $expmodels=Voiture::select('model',\DB::raw('avg(price) as prix'))
       ->groupBy('model')
        ->orderBy('prix','desc')
        ->paginate(6);
        $data2 = [];
 
        foreach($expmodels as $model) {
           $data2['label'][] = $model->model;
           $data2['data'][] = $model->prix;
         }
    
       $data2['chart_data2'] = json_encode($data2);
    $space=' ';
       $poppmodels=Voiture::select('brand','notes',\DB::raw('count(brand) as best'),\DB::raw('avg(price) as prix'))
       ->groupBy('brand','notes')
        ->orderBy('best','desc')
        ->paginate(6);
        $data3 = [];
 
        foreach($poppmodels as $model) {
           $data3['label'][] = $model->brand.' '.$model->notes;
           $data3['data'][] = round(($model->best*100)/$count);
         }
    
       $data3['chart_data3'] = json_encode($data3);
       $expbrand=Voiture::select('brand','notes',\DB::raw('count(brand) as best'),\DB::raw('avg(price) as prix'))
       ->groupBy('brand','notes')
        ->orderBy('prix','desc')
        ->paginate(6);
        $data4 = [];
 
        foreach($expbrand as $model) {
           $data4['label'][] = $model->brand.' '.$model->notes;
           $data4['data'][] = round(($model->prix));
         }
    
       $data4['chart_data4'] = json_encode($data4);

       $modelone=Voiture::select('brand','notes',\DB::raw('count(brand) as best'))
       ->where('model',$datatable['models'][0])
       ->groupBy('brand','notes')
        ->orderBy('best','desc')
        ->paginate(6);
        $mod1=[];
        foreach($modelone as $model){
            $mod1['brand'][]=$model->brand;
            $mod1['note'][]=$model->notes;
        }
        $modeltwo=Voiture::select('brand','notes',\DB::raw('count(brand) as best'))
       ->where('model',$datatable['models'][1])
       ->groupBy('brand','notes')
        ->orderBy('best','desc')
        ->paginate(6);

        $mod2=[];
        foreach($modeltwo as $model){
            $mod2['brand'][]=$model->brand;
            $mod2['note'][]=$model->notes;
        }
        $modelthree=Voiture::select('brand','notes',\DB::raw('count(brand) as best'))
       ->where('model',$datatable['models'][2])
       ->groupBy('brand','notes')
        ->orderBy('best','desc')
        ->paginate(6);
        $mod3=[];
        foreach($modelthree as $model){
            $mod3['brand'][]=$model->brand;
            $mod3['note'][]=$model->notes;
        }
        $modelfour=Voiture::select('brand','notes',\DB::raw('count(brand) as best'))
       ->where('model',$datatable['models'][3])
       ->groupBy('brand','notes')
        ->orderBy('best','desc')
        ->paginate(6);
        $mod4=[];
        foreach($modelfour as $model){
            $mod4['brand'][]=$model->brand;
            $mod4['note'][]=$model->notes;
        }
        $modelfive=Voiture::select('brand','notes',\DB::raw('count(brand) as best'))
        ->where('model',$datatable['models'][4])
        ->groupBy('brand','notes')
         ->orderBy('best','desc')
         ->paginate(6);
         $mod5=[];
         foreach($modelfive as $model){
             $mod5['brand'][]=$model->brand;
             $mod5['note'][]=$model->notes;
         }
         $modelsix=Voiture::select('brand','notes',\DB::raw('count(brand) as best'))
        ->where('model',$datatable['models'][5])
        ->groupBy('brand','notes')
         ->orderBy('best','desc')
         ->paginate(6);
         $mod6=[];
         foreach($modelsix as $model){
             $mod6['brand'][]=$model->brand;
             $mod6['note'][]=$model->notes;
         }

         $wilaya=Voiture2::select('location_wilaya',\DB::raw('count(location_wilaya) as best'))
         ->groupBy('location_wilaya')
          ->orderBy('best','desc')
          ->paginate(11);
          $data5 = [];
 
          foreach($wilaya as $wil) {
             $data5['label'][] = $wil->location_wilaya;
             $data5['data'][] = $wil->best;
           }

           $data5['chart_data5'] = json_encode($data5);
return view('best',compact('data','data2','data3','data4','data5','datatable','mod1','mod2','mod3','mod4','mod5','mod6'));
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
