<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Booking;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class BookingDetailsReadNotiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index($id,$notification_id)
    { 
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider')  and  Gate::allows('isGoing') ){

    $booking_id=$id;
    $notif_id=$notification_id;
  /* $notif=auth()->user()->unreadNotifications->where('id', $notification_id)->first();
   if($notif){
    $service_id=Booking::select('service_id')->where('id',$id)->first()->service_id;
    $flag=Service::where('user_id',auth()->user()->id)->where('id',$service_id)->first();*/
    $service_id=Booking::select('service_id')->where('id',$id)->first()->service_id;
    $flag=Service::where('user_id',auth()->user()->id)->where('id',$service_id)->first();
    if($flag){ 
    $booking=Booking::findOrFail($id);
 
    return view('provider.booking',compact('booking','booking_id','notif_id'));
     }
else{
    return redirect('home');
}
}
else{
    return redirect('home');
}
/*}
else{
return redirect('home');
}
}else{
   return redirect('provider/dashboard');
}   */
        
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
