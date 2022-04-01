<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Notification;
use App\Models\Provider\ProviderCoupon;

use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class CouponNotification extends Component
{
 public $couponId;
 public $notificationId;
 public $notif_type;

    public function mount($id ,$notif)
    {
        $this->couponId=$id;
        $this->notificationId=$notif;
        if(auth()->user()->unreadNotifications->where('id', $this->notificationId)->first()){
            $this->notif_type=auth()->user()->unreadNotifications->where('id', $this->notificationId)->first()->type;
           }
        
       
    }
    public function render()
    {
        $notif=auth()->user()->unreadNotifications->where('id', $this->notificationId)->first();
       
        if($notif){
             $coupon= ProviderCoupon::findOrFail($this->couponId);
            if($coupon){
                $notif->markAsRead();
                return view('livewire.client.coupon-notification',['coupon'=>$coupon]);
            }
             else{
                return  view('error-404');
             }
           
        }
        else{
            return view('livewire.client.coupon-notification');
        }
       
    }
}
