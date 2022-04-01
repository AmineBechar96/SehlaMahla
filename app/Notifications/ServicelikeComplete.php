<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;

class ServicelikeComplete extends Notification
{
    use Queueable;

    public $service_added;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(   Service $service_added)
    {
       
        $this->service_added=$service_added;
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
            'title'=>'Nouveau Favoris',
            'sub_title'=>'a Aimé Votre Service',

            'id'=>$this->service_added->id,
            'service_name'=>$this->service_added->title,
            'user_id'=>Auth::user()->id,
            'user_name'=>Auth::user()->name,
            'icon'=>'icon-heart',
            'color'=>'danger'

        ];
    }
}
