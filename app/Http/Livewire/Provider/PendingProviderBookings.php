<?php

namespace App\Http\Livewire\Provider;

use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Models\User;
use App\Notifications\Client\BookingHasBeenAccepted;
use Illuminate\Support\Facades\Notification;
use App\Events\RejectedBooking;

use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use Carbon\Carbon;
class PendingProviderBookings extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $booking_title ;
    public $loaded_booking_id ;
    public $loaded_booking_id_to_reject ;
    public $loaded_client_name_to_reject ;
    public $loaded_client_name_to_accept ;
    public $date;
    public $loaded_booking_title_to_cancel ;
    public $services_id;
    /**
     * mount the service id to check for it
     */
    public function mount()
    {
        $this->services_id=Service::where('user_id',auth()->user()->id)->pluck('id')->toArray();
      
    }

 
/**
 * load the data to of the booking to be canceled
 * take the id as parameter
 */
public function loadDataToReject($booking_id)
{
    //get the booking
    $booking=Booking::where('id',$booking_id)->whereIn('service_id',$this->services_id)->first();
    if($booking){
    //asign proprieties
     $this->loaded_booking_title_to_cancel =$booking->title;
     $this->loaded_client_name_to_reject=$booking->user->name;
     $this->loaded_booking_id_to_reject =$booking->id;
     $this->dispatchBrowserEvent('confirmReject');
}
else{
    //something wrong
     $this->dispatchBrowserEvent('somethingwrong');
}
}

    /**
     * go back the first page 
     * and search from there
     */
public function searchagency()
    {
        $this->gotoPage(1);
        
    }
    public function render()
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){
        //optional we already moubt the services of the current provider
        $services=Service::where('user_id',auth()->user()->id)->pluck('id')->toArray();
        return view('livewire.provider.pending-provider-bookings',
        ['bookings'=>Booking::where('status','pending')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)
        ->when($this->date=="yesterday", function($query){
            $query->where('created_at','>=', Carbon::now()->subDays(1));
        })
        ->when($this->date=="lastweek", function($query){
                $query->where('created_at','>=', Carbon::now()->subDays(7));
        })
        ->when($this->date=="lastmonth", function($query){
                    $query->where('created_at','>=', Carbon::now()->subMonth(1));
        })->latest()->paginate(2),
        'number_of_bookings'=>Booking::with('service')->whereIn('service_id',$services)->count(),
        'number_of_bookings_pending'=>Booking::with('service')->where('status','pending')->whereIn('service_id',$services)->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('status','pending')->whereIn('service_id',$services)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_client'=>Booking::distinct('user_id')->whereIn('service_id',$services)->count(),
        'total'=>Booking::where('status','pending')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)->count()]);
    }}
    /**
 * accept booking
 * take id of booking as parameter
 */
 public function accept($booking_id)
 {
 if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){
     //get the id of the booking
    //get the booking
    $booking=Booking::where('id',$booking_id)->whereIn('service_id',$this->services_id)->first();
    if($booking){
    //get then client name
    $this->loaded_client_name_to_accept=$booking->user->name;

     //update the booking
   $booking->update(['status'=>'accepted']);
    //go back the first page
    $this->gotoPage(1);

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
    $this->dispatchBrowserEvent('swal:BookingAcceptedPending');
    // send notification to client your booking has been accepted
    $client=User::findOrFail($booking->user_id);

    Notification::send($client, new BookingHasBeenAccepted($booking));

 }

}
else{
    //something wrong
     $this->dispatchBrowserEvent('somethingwrong');
}  
 }

/**
* reject any booking
* take the id of the booking as parameter
*/
public function reject($booking_id)
 {
if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){
    //get the id of the booking
    $booking=Booking::where('id',$booking_id)->whereIn('service_id',$this->services_id)->first();
    if($booking){
    //update the booking
   $booking->update(['status'=>'rejected']);
   //go back the first page
   $this->gotoPage(1);
   //remove points to provider 
   RejectedBooking::dispatch($booking);
   
  
}
else{
    //something wrong
     $this->dispatchBrowserEvent('somethingwrong');
}}
}

   




}
 