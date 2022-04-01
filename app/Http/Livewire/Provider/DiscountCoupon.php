<?php

namespace App\Http\Livewire\Provider;
use App\Models\Provider\Discount;
use App\Models\services\Service;
use App\Models\Provider\ProviderCoupon;

use App\Models\Provider\Client;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Client\NewProviderCoupon;
class DiscountCoupon extends Component
{
    public $editMode=false;
    public $search ;

    public $discount_service;
    public $rate;
    public $discount_title;
    public $valid_until;
    public $state=[];
    public $deleted_discount_name;
    public $deleted_discount_id;
    public $discountId;
    public $services;

public function mount()
{
    $this->services=Service::where('user_id',auth()->user()->id)->get();
}
   
    public function render()
    {

        $services=Service::where('user_id',auth()->user()->id)->get();
        
        $discounts=Discount::whereIn('service_id',$services->pluck('id')->toArray())->get();
        $clients=Client::select(\DB::raw('clients.*'),\DB::raw('sum(total) as totalsale'))
    ->join('invoices','clients.id','=','invoices.client_id')
    ->where(function($sub_query) {
        $sub_query->where('name','like', '%'.trim($this->search).'%');
        })
    ->whereIn('service_id',$services->pluck('id')->toArray())
    ->groupBy('client_id')->orderBy('totalsale','desc')
    ->get();
   
        return view('livewire.provider.discount-coupon',['discounts'=>$discounts,'services'=>$services,'clients'=>$clients]);
    }

/**
 * show modal and set the edit mode to false 
 */
public function addNew()
{
$this->resetErrorBag();
$this->reset(['discount_service','rate','discount_title','valid_until']);
//show modal
$this->dispatchBrowserEvent('showModal');
//edit mode
$this->editMode=false;
}


  /**
     * show the coupon to be updated in the modal
     */
    public function update($id)
    {
    $discount=Discount::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
    if($discount){

    //if the discount already has given to peaple you can not update it
    
    if($discount->coupons->isNotEmpty()) {
        $this->dispatchBrowserEvent('couponalreadygiven');
    }  
    else{
         //show modal
    $this->dispatchBrowserEvent('showModal');
    //edit mode
    $this->editMode=true;
    $this->state=$discount->toArray();
    $this->discount_service=$discount->service_id;
    $this->rate=$discount->taux;
    $this->discount_title=$discount->title;
    $this->valid_until=$discount->valid_until;
    }
   
    
    
    }
    else{
        //some thing not right
        $this->dispatchBrowserEvent('somethingwrong');
    }

}
    /**
     * create coupon 
     */

public function createDiscount()
{
        //validate the data
$this->validate([
    'discount_service'=>'required|exists:services,id',
    'discount_title'=>'required|string',
    'rate'=>'required|numeric|between:1,100',
    'valid_until'=>'required|date|after_or_equal:today',
               ]);
        
    if(in_array($this->discount_service,$this->services))  {        
    $data=array(
                'service_id'=>$this->discount_service,
                'title'=>$this->discount_title,
                'taux'=>$this->rate,
                'valid_until'=>$this->valid_until,
             );
Discount::create($data);

    //send success alert
    $this->dispatchBrowserEvent('success');

    //close the modal
    $this->dispatchBrowserEvent('closeModal');
            }
            else{
               // something wrong
               $this->dispatchBrowserEvent('somethingwrong');

            }
}
/**
 * update coupon
 */
public function updateDiscount()
{
   // dd('ok');
          //validate the data
$this->validate([
    'discount_service'=>'required|exists:services,id',
    'discount_title'=>'required|string',
    'rate'=>'required|numeric|between:1,100',
    'valid_until'=>'required|date|after_or_equal:today',
               ]); 

$updatedData=array(
    'service_id'=>$this->discount_service,
    'title'=>$this->discount_title,
    'taux'=>$this->rate,
    'valid_until'=>$this->valid_until,
             );

//get the discount to be updated
$editedDiscount=Discount::findOrFail($this->state['id']);


//update the coupon
$editedDiscount->update($updatedData);

//send success alert
$this->dispatchBrowserEvent('update');
 
//close the modal
$this->dispatchBrowserEvent('closeModal');
} 

/**
     * confirm delete
     * and get the id of the discount to be deleted
     */
   
    public function confirmDelete($id)
    {
        
        //get the discount
        $discount=Discount::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
        if($discount){
        //store the id of the discount
        $this->deleted_discount_id=$id;
        //store the name
        $this->deleted_discount_name=$discount->title;
        //show the confirm delete modal
        $this->dispatchBrowserEvent('showConfirmModal'); 
    }  
    else{
       // something wrong
       $this->dispatchBrowserEvent('somethingwrong');

    }
     }

         /**
          * delete the discount,
         */
        public function deleteDiscount()
        {
         // check if the disxount have some dispateched unused and inexprired coup if yes refuse to delete
         //find the discount,
        $discount=Discount::findOrFail($this->deleted_discount_id);
        if($discount){
            try{
         //delete the discount, 
         $discount->delete(); }
         catch(\Throwable $th){
            $this->dispatchBrowserEvent('somethingwrong');

         }
        }
        
        //close confrim modal
        $this->dispatchBrowserEvent('CloseConfirmModal');   

     }

       /**
         * change status
         */
public function unvalidate($id)
{
//get the discount
$discount=Discount::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
if($discount){

 //discount unvalid
if($discount->status=="valid"){
    //discount given to people 
    if(!empty($discount->coupons)) {
        $this->dispatchBrowserEvent('couponalreadygiven');
    }
     else{
        $discount->unvalid();
    }
    }
}
else{
  //  something wrong
  $this->dispatchBrowserEvent('somethingwrong');

}}

/**
 * show clients modal
 */
public function showClientModal($id)
{
    //set the coupon id 
    $discount=Discount::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
    if($discount){
    $this->discountId=$discount->id;
    //close confrim modal
    $this->dispatchBrowserEvent('showClientModal');   
}
else{
  //  something wrong
  $this->dispatchBrowserEvent('somethingwrong');

}
}

public  function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * add coupon to a client
 */
public function giveCouponToClient($id)
{
$client=Client::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
if($client)
   {
$code=implode('5', array( rand(1,10),$client->service->id,rand(1,10))); 
$couponCode=$this->generateRandomString(4).$code.$this->generateRandomString(3);


$data=array(
'discount_id'=> $this->discountId,
'client_id'=> $client->id,
'code'=>$couponCode,
);

ProviderCoupon::create($data);

$coupon=ProviderCoupon::where('discount_id',$this->discountId)->where('client_id',$client->id)->latest()->first();

//send notification to the client 
if(!is_null($client->user_id)){
$user=User::findOrFail($client->user_id);
Notification::send($user, new NewProviderCoupon($coupon));
}



$this->dispatchBrowserEvent('couponsend');   

$this->dispatchBrowserEvent('closeClientModal');   

   }
   else{
       //something wrong
    $this->dispatchBrowserEvent('somethingwrong');

   }
}

}
