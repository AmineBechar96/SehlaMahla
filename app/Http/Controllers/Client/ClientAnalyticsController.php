<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\services\Service;

use App\Models\Client\Booking;
use App\Models\Provider\Client;
use App\Models\Provider\ProviderCoupon;

use App\Models\Point;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class ClientAnalyticsController extends Controller
{


    public function index()
    {
        if(Auth::user()->hasVerifiedEmail() && Gate::allows('isClient') && Gate::allows('isActive')){
            $user_auth_id=Auth::user()->id;
            $savedServices=Service::with('type')->join('my_services','services.id','=', 'my_services.service_id')
            ->where('my_services.user_id',$user_auth_id)->count();
            $likedServices=auth()->user()->likes->count();
            $coupons=ProviderCoupon::join('clients','provider_coupons.client_id','=','clients.id')->where('user_id',$user_auth_id)->count();
            $booking=Booking::where('user_id',$user_auth_id)->get();
            $pending=$booking->where('status','pending');
            $accepted=$booking->where('status','accepted');
            $ongoing=$booking->where('status','ongoing');
            $completed=$booking->where('status','completed');
            $canceled=$booking->where('status','canceled');

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
            ((((count($completed)*100)/count($booking))+((count($canceled)*100)/count($booking)))/2))/2));
         } else {
             $behaviour=0;
         }
         
         
        return view('client.client-analytics',compact('savedServices','likedServices','coupons','booking','pending','accepted','ongoing','canceled'
        ,'completed','pendingLast','ongoingLast','acceptedLast','completedLast','canceledLast','nextBadge','platinium','behaviour'));
    }
    }
}
