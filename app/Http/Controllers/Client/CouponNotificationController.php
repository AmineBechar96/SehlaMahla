<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth ;
use App\Models\Provider\ProviderCoupon;

class CouponNotificationController extends Controller
{
    public function index($id, $notif_id)
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
            $coupon_id=$id;
            $notif=$notif_id;
            if(auth()->user()->unreadNotifications->where('id',$notif_id)->first()){
            $coupon=ProviderCoupon::where('id',$id)->first();
            if($coupon){
                return view('client.coupon',compact('coupon_id','notif'));
            }
            else{
                return redirect('home'); 
            }
            }
            else{
            return redirect('home');
            }
            }
            else {
                return redirect('home');
            }
    }
}
