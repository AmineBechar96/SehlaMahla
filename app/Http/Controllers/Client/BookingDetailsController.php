<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Booking;
use App\Models\services\Service;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth ;

class BookingDetailsController extends Controller
{
    public function index($id)
    { 
if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
       $booking= Booking::where('id',$id)->where('user_id',auth()->user()->id)->first();
       if($booking){
        return view('client.booking-details',compact('booking'));}
        else{
           return  redirect('home');
        }
    }
    else{
        return redirect('home');
    }}
}
