<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\services\Service;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth ;
use App\Models\Client\Booking;
use App\Notifications\NewServiceBooking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
    $user_id=auth()->user()->id;
    $date;
    $time;
    if($request->radiocolor=='current'){
    $validatedData = $request->validate([
        'service_id' => 'required|exists:services,id',
        'booking_title' => 'required|string|min:10|max:30', 
        'booking_addresse' => 'required|string|min:20|max:40',
        'radiocolor' => 'required|string|in:current,schedule', 
        'booking_description' => 'required|string|min:20|max:120',
        
    ]);
    $date = Carbon::now()->toDateString();
    $time= Carbon::now()->toTimeString();
}
else{
    $validatedData = $request->validate([
        'service_id' => 'required|exists:services,id',
        'booking_title' => 'required|string|min:10|max:30', 
        'booking_addresse' => 'required|string|min:20|max:40',
        'radiocolor' => 'required|string|in:current,schedule', 
        'booging_date' => 'required|date|after_or_equal:today',
        'booking_time' => 'required|date_format:H:i',
        'booking_description' => 'required|string|min:20|max:120',
        
    ]);
    $date=$request->booking_date;
    $time=$request->booking_time;
}

    $storedData=array(
        'user_id'=>$user_id,
        'service_id'=>$request->service_id,
        'title'=>$request->booking_title,
        'address'=>$request->booking_addresse,                     
        'booking_time'=>$time,
        'booking_date'=>$date,
        'description'=>$request->booking_description,
    
            
    );
    Booking::create($storedData);

    $booking_id=Booking::latest()->first()->id;
    session()->flash('success2', 'Votre Reservasion a été enregistré avec success');
    
    $booked_service=Service::find($request->service_id);
    $provider=$booked_service->user()->get();
    Notification::send($provider, new NewServiceBooking($booked_service,$booking_id));
    return redirect()->back();
}
else{
    return redirect('home');
}
 
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
