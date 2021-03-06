<?php

namespace App\Notifications\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Provider\ProviderCoupon;
use Illuminate\Support\Facades\Auth ;

class NewProviderCoupon extends Notification
{
   use Queueable;
   public $providerCoupon;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ProviderCoupon $coupon)
    {
        $this->providerCoupon=$coupon;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title'=>'Nouveau Coupon',
            'sub_title'=>' Vous Offre un Coupon',
            'coupon_id'=>$this->providerCoupon->id,
            'id'=>$this->providerCoupon->discount->service->id,
            'service_name'=>$this->providerCoupon->discount->service->title,
            'user_id'=>Auth::user()->id,
            'user_name'=>Auth::user()->name,
            'icon'=>'icon-gift',
            'color'=>'success'
        ];
    }
}
