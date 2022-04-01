<?php

namespace App\Http\Controllers\Provider;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        if( Gate::allows('isProvider') and Auth::user()->hasVerifiedEmail() and  Gate::allows('isGoing')){
        return view('provider.discounts');
        }
    }
}
