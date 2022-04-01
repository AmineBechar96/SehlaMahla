<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
class JobDone extends Notification
{
    use Queueable;
    public $booked_service;
    public $booking_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Service $booked_service,   $booking_id)
    {
           $this->booked_service=$booked_service;
           $this->booking_id=$booking_id;
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
            'title'=>'Bon Travail',
            'sub_title'=>'Vous Remercie Pour Votre Service ',
            'booking_id'=>$this->booking_id,
            'id'=>$this->booked_service->id,
            'service_name'=>$this->booked_service->title,
            'user_id'=>Auth::user()->id,
            'user_name'=>Auth::user()->name,
            'icon'=>'icon-thumbs-up',
            'color'=>'success'
        ];
    }
}
