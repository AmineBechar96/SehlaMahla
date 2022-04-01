<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\services\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //best and recommanded mixt of all services
        $recommended=Service::select('services.*',\DB::raw('count(*) as total'))->join('bookings', 'services.id', '=', 'bookings.service_id')
        ->join('users', 'services.user_id', '=', 'users.id')
        ->join('points', 'users.id', '=', 'points.user_id')
        ->groupBy('bookings.service_id')
        ->orderBy('points.number_of_points','desc')
        ->take(10)
        ->get();
        //doctors and dentist
        $doctors=Service::select('services.*',\DB::raw('count(*) as total'))->join('bookings', 'services.id', '=', 'bookings.service_id')
        ->join('users', 'services.user_id', '=', 'users.id')->join('points', 'users.id', '=', 'points.user_id')
        ->whereIn('type_id',[28,29,30,31,32,33,34,35,36,37,38,39,40,41])
        ->groupBy('bookings.service_id')
        ->take(10)
        ->get();
        // restaurant accross the country
        $restaurants=Service::select('services.*',\DB::raw('count(*) as total'))->join('bookings', 'services.id', '=', 'bookings.service_id')
        ->join('users', 'services.user_id', '=', 'users.id')->join('points', 'users.id', '=', 'points.user_id')
        ->whereIn('type_id',[53,54])
        ->groupBy('bookings.service_id')
        ->take(10)
        ->get();
        //transport operators and shippers
        $transporters=Service::select('services.*',\DB::raw('count(*) as total'))->join('bookings', 'services.id', '=', 'bookings.service_id')
        ->join('users', 'services.user_id', '=', 'users.id')->join('points', 'users.id', '=', 'points.user_id')
        ->whereIn('type_id',[57,59,58,84,85,86,87,88])
        ->groupBy('bookings.service_id')
        ->take(10)
        ->get();
    return view('home',compact('recommended','doctors','restaurants','transporters'));
     
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
