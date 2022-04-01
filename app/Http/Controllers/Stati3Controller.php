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
class Stati3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasVerifiedEmail()){
 $date = voiture::select('adDate', \DB::raw('count(adDate) as best'), )
 ->groupBy('adDate')
 ->orderBy('best','desc')
 ->paginate(9);
 $data2 = [];
 
 foreach($date as $model) {
$data2['label'][] = $model->adDate;
$data2['data'][] = $model->best;
         }
 $data2['chart_data2'] = json_encode($data2);
 $sales = voiture::select('adDate', \DB::raw('avg(price) as prix'))
 ->groupBy('adDate')
 ->paginate(6);
 $data3 = [];
 
 foreach($sales as $model) {
$data3['label'][] = $model->adDate;
$data3['data'][] = $model->prix;
         }
 $data3['chart_data3'] = json_encode($data3);
 $previous_month_sales = voiture::select('adDate', \DB::raw('sum(price) as prix') ,\DB::raw('count(*) as total'))
 ->whereMonth('adDate','=',4)
 ->groupBy('adDate')
 ->paginate(6);
 $data4 = [];
 
 foreach($previous_month_sales as $model) {
$data4['label'][] = $model->adDate;
$data4['data'][] = $model->prix;
         }
 $data4['chart_data4'] = json_encode($data4);
 $current_month_sales = voiture::select('adDate', \DB::raw('sum(price) as prix') ,\DB::raw('count(*) as total'))
 ->whereMonth('adDate','=',5)
 ->groupBy('adDate')
 ->paginate(6);
 $data5 = [];
 
 foreach($current_month_sales as $model) {
$data5['label'][] = $model->adDate;
$data5['data'][] = $model->prix;
         }
 $data5['chart_data5'] = json_encode($data5);
 $total_monthly_sales = voiture::select('adDate', \DB::raw('sum(price) as prix') ,\DB::raw('count(*) as total'))
 ->groupBy(\DB::raw('MONTH(adDate)'))
 ->paginate(6);
 $data6 = [];
 
 foreach($total_monthly_sales as $model) {
$data6['label'][] = $model->adDate;
$data6['data'][] = $model->prix;
         }
 $data6['chart_data6'] = json_encode($data6);
 $goal_monthly_sales = voiture::select('adDate' ,\DB::raw('count(*) as total'))
 ->where(\DB::raw('MONTH(adDate)'),'=', 4)
 ->paginate(6);
$goal=50000;
//


 
$data7 = [];
 
 foreach($goal_monthly_sales as $model) {
$data7['label'][] = $model->adDate;
$data7['data'][] = $model->total;
$data7['goal'][] = 50000;
         }
 $data7['chart_data7'] = json_encode($data7);
 $peugeotSales = voiture2::select('location_wilaya' ,\DB::raw('count(*) as total'))
 ->where('model','=','Peugeot')
 ->whereIn('location_wilaya',["Alger","Oran","Blida","Boumerdes","Setif","Constantine"
 ,"Mostaganem", "Tlemcen","Mila","Tiaret","Batna","Tipaza","Chlef"])
 ->groupBy('location_wilaya')
 ->orderBy('location_wilaya','asc')
 ->paginate(13);
$data8 = [];
 
 foreach($peugeotSales as $model) {
$data8['label'][] = $model->location_wilaya;
$data8['data'][] = $model->total;
         }
 $data8['chart_data8'] = json_encode($data8);
 $renaultSales = voiture2::select('location_wilaya' ,\DB::raw('count(*) as total'))
 ->where('model','=','Renault')
 ->whereIn('location_wilaya',["Alger","Oran","Blida","Boumerdes","Setif","Constantine"
 ,"Mostaganem", "Tlemcen","Mila","Tiaret","Batna","Tipaza","Chlef"])
 ->groupBy('location_wilaya')
 ->orderBy('location_wilaya','asc')
 ->paginate(13);
$data9 = [];
 
 foreach($renaultSales as $model) {
$data9['label'][] = $model->location_wilaya;
$data9['data'][] = $model->total;
         }
 $data9['chart_data9'] = json_encode($data9);
//$total=$data7['data'];
 /*$taux=$total*100/$goal;*/
 //return $peugeotSales;
     return view('market',compact('data2','data3','data4','data5','data6','data7','goal','data8','data9'));
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
