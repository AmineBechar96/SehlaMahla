<?php

namespace App\Http\Livewire\Provider;
use App\Models\Provider\Discount;
use App\Models\services\Service;
use App\Models\Provider\ProviderCoupon;
use Livewire\Component;

class MyCoupons extends Component
{


    public $discount_id;
  
    public function mount($id)
    {
        $this->discount_id=$id;
       
    }
    public function render()
    {

        $services=Service::where('user_id',auth()->user()->id)->get();
        $discount=Discount::where('id',$this->discount_id)->whereIn('service_id',$services->pluck('id')->toArray())->first();
       if($discount){
        $coupons=ProviderCoupon::where('discount_id',$this->discount_id)->get();
        return view('livewire.provider.my-coupons',['coupons'=>$coupons,'discount'=>$discount]);
    }
else{
    return view('livewire.provider.my-coupons',['discount'=>$discount]);
    }
}
}
