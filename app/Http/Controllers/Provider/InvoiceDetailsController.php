<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider\Invoice;
use App\Models\Provider\InvoiceParameters;
use App\Models\Provider\InvoiceOrder;
use PDF;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class InvoiceDetailsController extends Controller
{
 public function index($id)
 {
  if (Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and  Gate::allows('isGoing')) {
    //get the parameters of the current provider
    $parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
   ///get the invoice 
    $invoice=Invoice::where('id',$id)->where('parmeter_id',$parameters->id)->first();
   //dd($invoice->discount_value);
   if($invoice){
   return view('provider.invoice-details',compact('invoice','parameters'));
  }
  else{
    return view('page-not-authorized');
  }
  } 
  else {
      return redirect('home');
   }
 }
 /**
  * download invoice
  */
 public function downloadPDF($id)
 {
  if (Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider')  and  Gate::allows('isGoing')) {

   //get the parameters of the current provider
    $parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
   ///get the invoice 
    $invoice=Invoice::where('id',$id)->where('parmeter_id',$parameters->id)->first();
    if($invoice){
    $data = [
      'invoice' => $invoice,
      'parameters'=>$parameters,
    ];
    $pdf = PDF::loadView('provider.print-inv', $data);
    return $pdf->stream('document.pdf');
  } 
 
  else{
    return view('page-not-authorized');
  }
}
  else {
      return redirect('home');
   }
 }
}
