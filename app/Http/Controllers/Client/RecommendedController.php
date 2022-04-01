<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class RecommendedController extends Controller
{
   

    public function index(){ 
        if(Auth::user() and Auth::user()->hasVerifiedEmail()  and Gate::allows('isClient') and  Gate::allows('isActive')){
         return view('client.recommended');
    }
}
}
