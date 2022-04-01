<?php

namespace App\Notifications\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Client\Booking;
use Illuminate\Support\Facades\Auth ;

class BookingHasBeenFinished extends Notification
{
    use Queueable;
    public $booking;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking=$booking;
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
            'title'=>'Travail Accompli',
            'sub_title'=>' a Terminé Votre Service',
            'booking_id'=>$this->booking->id,
            'id'=>$this->booking->service->id,
            'service_name'=>$this->booking->service->title,
            'user_id'=>Auth::user()->id,
            'user_name'=>Auth::user()->name,
            'icon'=>'icon-check',
            'color'=>'success'
        ];
    }
}
