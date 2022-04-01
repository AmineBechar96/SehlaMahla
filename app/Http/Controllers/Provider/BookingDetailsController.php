<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Booking;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;

class BookingDetailsController extends Controller
{
    public function index($id)
    { 
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider')  and  Gate::allows('isGoing') ){

      $service_id=Booking::select('service_id')->where('id',$id)->first()->service_id;
      $flag=Service::where('user_id',auth()->user()->id)->where('id',$service_id)->first();
      $booking=Booking::findOrFail($id);


if($flag){
    return view('provider.booking-details',compact('booking'));
}
else{
return redirect('home');
}
      
        
}else{
    return redirect('home');  
}
}
}
