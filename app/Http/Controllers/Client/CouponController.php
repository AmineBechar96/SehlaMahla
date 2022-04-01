<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider\Client;
use App\Models\Provider\ProviderCoupon;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth ;
class CouponController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasVerifiedEmail() && Gate::allows('isClient') && Gate::allows('isActive')){

        $client=Client::where('user_id',auth()->user()->id)->get();

        if($client){
            $provider_coupons=ProviderCoupon::whereIn('client_id',$client->pluck('id')->toArray())->get();
        }
       else{
           
        $provider_coupons=[];
       }
    
        return view("client.coupons",compact('provider_coupons'));
    }
    }
}
