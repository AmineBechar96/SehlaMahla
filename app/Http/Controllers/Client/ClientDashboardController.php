<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\services\MyService;

use App\Models\services\Service;
use App\Models\Client\Booking;

use App\Models\Point;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use DB;
class ClientDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasVerifiedEmail() && Gate::allows('isClient') && Gate::allows('isActive')){
        $user_auth_id=Auth::user()->id;
        $savedServices=Service::with('type')->join('my_services','services.id','=', 'my_services.service_id')
        ->where('my_services.user_id',$user_auth_id)->get();

        $saved=Service::with('type')->select(DB::raw('count(*) as Total'),DB::raw("(DATE_FORMAT(my_services.created_at, '%D')) as day"))->join('my_services','services.id','=', 'my_services.service_id')
        ->where('my_services.user_id',$user_auth_id)
        
        ->groupBy(DB::raw("DATE_FORMAT(my_services.created_at, '%d')"))
        ->orderBy('my_services.created_at')
        ->get();
        
       //liked service chart
        $liked=Service::with('type')->select(DB::raw('count(*) as Total'),DB::raw("(DATE_FORMAT(service_user.created_at, '%D')) as day"))
        ->join('service_user','services.id','=', 'service_user.service_id')
        ->where('service_user.user_id',$user_auth_id)
      
        ->groupBy(DB::raw("DATE_FORMAT(service_user.created_at, '%d')"))
        ->orderBy('service_user.created_at')
        ->get();

        $likedServices=auth()->user()->likes->count();
        
        $badgecolor=Point::select('badge_color')->where('user_id',Auth::user()->id)->first();
        $bookings=Booking::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->latest()->take(4)->get();
        $currentYearBooking=Booking::where('user_id',Auth::user()->id)->whereYear('created_at', Carbon::now()->year)->where('status','completed')->count();
        $lastYearBooking=Booking::where('user_id',Auth::user()->id)->whereYear('created_at', Carbon::now()->subYear()->year)->where('status','completed')->count();
        
        if(Gate::allows('isClient')){
          //  return $badgecolor;
        return view('client.dashboard-client',compact('savedServices','likedServices','saved','liked','badgecolor','bookings','currentYearBooking','lastYearBooking'));
    }
  else{
      dd('you are not client');
  }}else{
      return redirect('login');
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
     /**
     * mark as read notificaation
     */
    public function markAsRead()
    {
      $userNotification=auth()->user()->unreadNotifications;
      if($userNotification){
          $userNotification->markAsRead();
          
      }
      return back();
    }
}
