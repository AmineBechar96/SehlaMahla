<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use App\Models\Provider\Invoice;
use App\Models\Provider\InvoiceParameters;
use App\Models\Provider\InvoiceOrder;
use App\Models\Provider\Client;
use App\Models\services\Service;
use Carbon\Carbon;



class Invoices extends Component
{
    public $search ;
    public $searchInvoice ;

    public $clientName;
    public $clientEmail;
    public $clientAddress;
    public $clientPhone;
    public $clientService;
    public $deleted_invoice_name;
    public $deleted_invoice_id;
    public $invoice_param;
/**
     * go back the first page 
     * and search from there
     */



     /**
      * mount
      */



      public function mount()
      {
         //get the invoice parameters
         $this->invoice_param=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
      }

    public function searchagency()
    {
        $this->gotoPage(1);
        
    }

public function render()
    {
         

        //get all the services (id) of the current provider
         $services_id=Service::where('user_id',auth()->user()->id)->pluck('id')->toArray();
         //get all the clients of the service provider
         $clients=Client::where(function($sub_query) {
             $sub_query->where('name','like', '%'.trim($this->search).'%');
             })->whereIn('service_id',$services_id)->get();
         //if it has 
        
         if( $this->invoice_param){
             //get all invoice with the paramerter id of the current provider
            $invoices=Invoice::where('parmeter_id', $this->invoice_param->id)->where(function($sub_query) {
                $sub_query->where('invoice_number','like', '%'.trim($this->searchInvoice).'%');
                })->latest()->get();       
           
            return view('livewire.provider.invoices',['invoices'=>$invoices,'clients'=>$clients]
           );
        }
        else{
            $invoices=[];
            
            return view('livewire.provider.invoices',['invoices'=>$invoices,'clients'=>$clients,]   );
        }
        
       
    }

    /**
     * pick a client to generate an invoice
     */
 public function chooseClient()
    {
        //show clients modal 
       $this->dispatchBrowserEvent('pickClient');
    }

     /**
     * see  client Details
     */
public function showClientDetails($id)
    {
        //get all the services (id) of the current provider
        $services_id=Service::where('user_id',auth()->user()->id)->pluck('id')->toArray();
        //get the right client and check for the service his belongs
        $client=Client::where('id',$id)->whereIn('service_id',$services_id)->first();
        if($client){
        // set the propreties
        $this->clientName=$client->name;
        $this->clientEmail=$client->email;
        $this->clientAddress=$client->address;
        $this->clientPhone=$client->phone;
        $this->clientService=$client->service->title;

        //show clients modal 
       $this->dispatchBrowserEvent('showClient');
    }
    else{
        $this->dispatchBrowserEvent('somethingwrong');
    }
}

   /**
    * confirm delete
    * and get the id of the product to be deleted
    */
  
public function confirmDelete($id)
   {
       
      
       $invoice=Invoice::where('id',$id)->where('parmeter_id',$this->invoice_param->id)->first();
       if($invoice){
       $this->deleted_invoice_id=$id;    
       $this->deleted_invoice_name=$invoice->invoice_number;
       $this->dispatchBrowserEvent('showConfirmModal');   
    }
else{
    $this->dispatchBrowserEvent('somethingwrong');
}
}

/**
* delete the invoice
*/
public function deleteInvoice()
{
    //get the invoice
    $invoice=Invoice::findOrFail($this->deleted_invoice_id);
    try{
        $invoice->delete();
    //close confrim modal
      $this->dispatchBrowserEvent('CloseConfirmModal');
      $this->render();   
    }
    catch(\Throwable $th){
        $this->dispatchBrowserEvent('somethingwrong');

    }

}
/**
 * 
 *change the status of the invoice
 */


 public function changeStatus($id,$status)
 {   
     //find the invoice
     $invoice=Invoice::where('id',$id)->where('parmeter_id',$this->invoice_param->id)->first();
if($invoice){
     //change  invoice from paid to unpaid
     if ($invoice->status=="paid" and $status=="unpaid") {
        $invoice->update(['status'=>"unpaid",'payment_date'=>null]);
     } 
     //change  invoice from paid to partially_paid
     elseif($invoice->status=="paid" and $status=="partially_paid") {
        $invoice->update(['status'=>"partially_paid"]);
     } 
     //change  invoice from unpaid to paid
     elseif($invoice->status=="unpaid" and $status=="paid") {
        $invoice->update(['status'=>"paid",'payment_date'=>Carbon::now()]);
     }
     //change  invoice from unpaid  to partially_paid
     elseif($invoice->status=="unpaid" and $status=="partially_paid") {
        $invoice->update(['status'=>"partially_paid"]);
     }
     //change  invoice from partially_paid to paid
     elseif($invoice->status=="partially_paid" and $status=="paid") {
        $invoice->update(['status'=>"paid",'payment_date'=>Carbon::now()]);
     }
     //change  invoice from partially_paid to unpaid
     else {
        $invoice->update(['status'=>"unpaid"]);
     }
     
 }
 else{
    $this->dispatchBrowserEvent('somethingwrong');
 }
}
}
