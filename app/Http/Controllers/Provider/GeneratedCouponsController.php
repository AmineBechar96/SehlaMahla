<?php

namespace App\Http\Controllers\Provider;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider\Discount;

class GeneratedCouponsController extends Controller
{
    public function index($id)
    {
        if( Gate::allows('isProvider') and Auth::user()->hasVerifiedEmail() and  Gate::allows('isGoing') ){

        $discount=Discount::findOrFail($id);
        $discount_id=$discount->id;
        if($discount){
            return view('provider.coupons',compact('discount_id'));
        }
        else{
            return redirect('home');
        }
    }}
}
