<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Models\services\Service;
use App\Models\Client\Booking;
use App\Models\Provider\InvoiceParameters;
use App\Models\Provider\Invoice;

use App\Models\services\MyService;
use App\Models\services\MyLikedService;
use Carbon\Carbon;

use DB;
use App\Models\Point;


class ServiceProviderDashboardController extends Controller
{
 /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Auth::user()){
        if(Gate::allows('isProvider') and  Gate::allows('isGoing')){
            $user_id=Auth::user()->id;
            $services=Service::where('user_id',$user_id)->get();
            $badgecolor=Point::select('badge_color')->where('user_id',$user_id)->first();
            $services=Service::where('user_id',$user_id)->pluck('id')->toArray();
            
            $number_of_subscriber=MyService::whereIn('service_id',$services)->count();
            $number_of_favoris=MyLikedService::whereIn('service_id',$services)->count();
            //saved service chart
            $saved=Service::with('type')->select(DB::raw('count(*) as Total'),DB::raw("(DATE_FORMAT(my_services.created_at, '%D')) as day"))
           ->join('my_services','services.id','=', 'my_services.service_id')->whereIn('my_services.service_id',$services)
           
           ->groupBy(DB::raw("DATE_FORMAT(my_services.created_at, '%d')"))
           ->orderBy('my_services.created_at')
           ->get();
        
       //liked service chart
        $liked=Service::with('type')->select(DB::raw('count(*) as Total'),DB::raw("(DATE_FORMAT(service_user.created_at, '%D')) as day"))->join('service_user','services.id','=', 'service_user.service_id')
        ->whereIn('service_user.service_id',$services)
        
        ->groupBy(DB::raw("DATE_FORMAT(service_user.created_at, '%d')"))
        ->orderBy('service_user.created_at')
        ->get();
            $bookings=Booking::whereIn('service_id',$services)->orderBy('created_at','desc')->latest()->take(4)->get();


            // get the total revenue of the the month
            $parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();

if ($parameters) {
            $currentYear=Invoice::select(\DB::raw('sum(total) as TotalRevenue'))->where('parmeter_id',$parameters->id)
            ->where('status','paid')->whereYear('created_at', Carbon::now()->year)->first();

            $lastYear=Invoice::select(\DB::raw('sum(total) as TotalRevenue'))->where('parmeter_id',$parameters->id)
            ->where('status','paid')->whereMonth('created_at', Carbon::now()->subYear()->year)->first();


} else {
    $currentYear =null;
    $lastYear=null;
    $currentYearD=[];
    $lastYearD=[];
}

           
           // dd($currentYearD);
           

            return view('provider.dashboard-provider',compact('services','badgecolor','number_of_subscriber','liked','saved','number_of_favoris','bookings','currentYear','lastYear'));
    }
  else{
    return redirect('login');
  }
}else{
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
