<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\services\Service;
use App\Models\Client\Booking;
use App\Models\Provider\Client;
use App\Models\services\MyService;

use App\Models\Provider\Invoice;
use App\Models\Provider\InvoiceParameters;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;

class ProviderAnalyticsController extends Controller
{
    public function index()
    {
 
    if(Auth::user()->hasVerifiedEmail() && Gate::allows('isProvider') and  Gate::allows('isGoing')){
        $user_auth_id=Auth::user()->id;
        $services=Service::where('user_id',$user_auth_id)->pluck('id')->toArray();
        $savedServices=MyService::whereIn('service_id',$services)->count();
        // get the total revenue of the the month
        $parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();

        if ($parameters) {
          $total=Invoice::select(\DB::raw('sum(total) as TotalRevenue'))
                       ->where('parmeter_id',$parameters->id)->where('status','paid')
                       ->whereYear('created_at', Carbon::now()->year)
                       ->first();
                      $totall= $total->TotalRevenue;
        } else {
            $totall=0;
        }
        $clients=Client::whereIn('service_id',$services)->get();
        
        $booking=Booking::whereIn('service_id',$services)->get();
        
        $pending=$booking->where('status','pending');
        $accepted=$booking->where('status','accepted');
        $ongoing=$booking->where('status','ongoing');
        $completed=$booking->where('status','completed');
        $canceled=$booking->where('status','canceled');
        $rejected=$booking->where('status','rejected');

        $pendingLast=$pending->last();
        $ongoingLast=$ongoing->last();
        $acceptedLast=$accepted->last();
        $completedLast=$completed->last();
        $canceledLast=$canceled->last();

        if (Auth::user()->points->badge_color=="Bronze")
        {
        $nextBadge=round((Auth::user()->points->number_of_points*100)/300);
        $platinium=round((Auth::user()->points->number_of_points*100)/1000);
        }
        elseif(Auth::user()->points->badge_color=="Silver"){
        $nextBadge =round((Auth::user()->points->number_of_points*100)/600);
        $platinium=round((Auth::user()->points->number_of_points*100)/1000);}
        elseif(Auth::user()->points->badge_color=="Gold"){
        $nextBadge=round((Auth::user()->points->number_of_points*100)/1000);
        $platinium=round((Auth::user()->points->number_of_points*100)/1000);}
        else{
        $nextBadge=round((Auth::user()->points->number_of_points*100)/(Auth::user()->points->number_of_points*2));
        $platinium=round((Auth::user()->points->number_of_points*100)/2000);
        
     }
     

     if (count($booking)>0) {
        $behaviour=round((((Auth::user()->reported()*100)/10 +
        ((((count($completed)*100)/count($booking))+((count($rejected)*100)/count($booking)))/2))/2));
     } else {
         $behaviour=0;
     } 

    return view('provider.provider-analytics',compact('savedServices','clients','totall','booking','pending','accepted','ongoing','rejected'
    ,'completed','pendingLast','ongoingLast','acceptedLast','completedLast','canceledLast','nextBadge','platinium','behaviour'));
}
}
}
