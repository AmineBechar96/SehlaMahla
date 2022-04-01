<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use Illuminate\Support\Facades\Notification;
use App\Models\Client\Booking;
use App\Notifications\Client\BookingHasBeenAccepted;
use App\Models\services\Service;
use App\Models\User;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Events\RejectedBooking;

class BookingNotification extends Component
{
    public $bookingId;
    public $notificationId;
    public $notif_type;
    public $loaded_client_name_to_accept;

    public function mount($id ,$notif)
    {
        $this->bookingId=$id;
        $this->notificationId=$notif;
        if(auth()->user()->unreadNotifications->where('id', $this->notificationId)->first()){
        $this->notif_type=auth()->user()->unreadNotifications->where('id', $this->notificationId)->first()->type;}
    }
    public function render()
    {
       // dd($this->notif_type);
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){

$notif=auth()->user()->unreadNotifications->where('id', $this->notificationId)->first();
   if($notif){
        $service_id=Booking::select('service_id')->where('id',$this->bookingId)->first()->service_id;
        $flag=Service::where('user_id',auth()->user()->id)->where('id',$service_id)->first();
        if($flag){
       //mark the notification as read
       $notif->markAsRead();
        return view('livewire.provider.booking-notification',['booking'=>Booking::findOrFail($this->bookingId)]);
        }
        else{
            return view('page-not-authorized');
        }
        
    }
    return view('livewire.provider.booking-notification',['booking'=>Booking::findOrFail($this->bookingId)]);
    }
    /// retune somethingh wentwrong

    }

       /**
 * accept booking
 * take id of booking as parameter
 */
 public function accept($booking_id)
 {
 if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider')){
     //get the id of the booking
    $booking=Booking::findOrFail($booking_id);

     //get then client name
     $this->loaded_client_name_to_accept=$booking->user->name;

     //update the booking
    $booking->update(['status'=>'accepted']);
    
 //check if there is already a chat channel opened
 $conversation=Conversation::where('sender_id',auth()->user()->id)->where('receiver_id',$booking->user->id)->first();

   
 if(is_null($conversation)){
 //open conversation channel between the two
 Conversation::create([
     'sender_id'=>auth()->user()->id,
     'receiver_id'=>$booking->user->id,
     'booking_id'=>$booking->id

 ]);
  
 //send a welcome message to the client
 //1-get the last conversation channel
 $conversation=Conversation::latest()->first();
 //2-send the message
 Message::create([
     'conversation_id'=>$conversation->id,
     'user_id'=>auth()->user()->id,
     'body'=>'BienVenu '.$this->loaded_client_name_to_accept.' Vous Pouvez Nous Contacter Directement Avec le Chat', 
 ]);

 
}



    //the notification has been sent 
    $this->dispatchBrowserEvent('swal:BookingAcceptedPendingFromNotification');
    // send notification to client your booking has been accepted
    $client=User::findOrFail($booking->user_id);
   // dd($client);
    Notification::send($client, new BookingHasBeenAccepted($booking));
    return redirect('provider/accepted/bookings');
 }

     
 }

/**
* reject any booking
* take the id of the booking as parameter
*/
public function reject($booking_id)
 {
if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider')){
    //get the id of the booking
   $booking=Booking::findOrFail($booking_id);
    //update the booking
   $booking->update(['status'=>'rejected']);
   //remove points to provider 
   RejectedBooking::dispatch($booking);
   return redirect('provider/rejected/bookings');
}
}

}
  
