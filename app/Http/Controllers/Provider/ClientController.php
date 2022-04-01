<?php

namespace App\Http\Controllers\Provider;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and  Gate::allows('isGoing')) {
        return view('provider.clients-list');
        return view('provider.products');
    } else {
       return redirect('home');
    }
    }
}
