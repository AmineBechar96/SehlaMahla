<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider\Client;
use App\Models\services\Service;
use App\Models\Provider\Invoice;
use App\Models\Provider\InvoiceParameters;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class OrderCheckoutController extends Controller
{
    public function index($id)
    {
      if (Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and  Gate::allows('isGoing')) {

      $client_id=$id;
      $services=Service::where('user_id',auth()->user()->id)->get('id');
      $client=Client::where('id',$id)->whereIn('service_id',$services)->get();
      if($client){
      return view('provider.order-checkout',compact('client_id'));
    }
  else{
    return redirect('home');
  }
} else {
  return redirect('home');
}
}

/**
 * edit
 */
public function edit($id)
{
$invoice_id=$id;
 $parameter=InvoiceParameters::where('provider_id',auth()->user()->id)->first();

 $invoice=Invoice::where('id',$id)->where('parmeter_id',$parameter->id)->get();
 if($invoice){ 
  return view('provider.edit-order-checkout',compact('invoice_id'));
 }
 else{
   return redirect('home');
 }
}
}
