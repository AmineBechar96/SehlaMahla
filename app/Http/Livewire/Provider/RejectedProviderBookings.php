<?php

namespace App\Http\Livewire\Provider;

use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Client\BookingHasBeenAccepted;

use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Carbon\Carbon;

use Illuminate\Support\Facades\Gate;
class RejectedProviderBookings extends Component
{

    

    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    
    public $loaded_client_name_to_accept;
    
  public $date;
  public $services_id;
 
public function mount(){
    $this->services_id=Service::where('user_id',auth()->user()->id)->pluck('id')->toArray();
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

            $services=Service::where('user_id',auth()->user()->id)->pluck('id')->toArray();
            return view('livewire.provider.rejected-provider-bookings',
        ['bookings'=>Booking::where('status','rejected')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)->when($this->date=="yesterday", function($query){
            $query->where('created_at','>=', Carbon::now()->subDays(1));
            })->when($this->date=="lastweek", function($query){
                $query->where('created_at','>=', Carbon::now()->subDays(7));
                })
            ->when($this->date=="lastmonth", function($query){
                    $query->where('created_at','>=', Carbon::now()->subMonth(1));
                    })->latest()->paginate(2),
        'number_of_bookings'=>Booking::with('service')->whereIn('service_id',$services)->count(),
        'number_of_bookings_rejected'=>Booking::with('service')->where('status','rejected')->whereIn('service_id',$services)->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('status','rejected')->whereIn('service_id',$services)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_client'=>Booking::distinct('user_id')->whereIn('service_id',$services)->count(),
        'total'=>Booking::where('status','rejected')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)->count()
        ]);
    }
    }
       /**
 * accept booking
 * take id of booking as parameter
 */
 public function accept($booking_id)
 {
 if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){
     //get the id of the booking
     $booking=Booking::where('user_id',$client_id)->where('id',$booking_id)->first();
     if($booking){
     //update the booking
    $booking->update(['status'=>'accepted']);
    //go back the first page
    $this->gotoPage(1);
    //get the client name
    $this->loaded_client_name_to_accept= $booking->user->name;
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
 }else{
     //something wrong
     $this->dispatchBrowserEvent('somethingwrong');
 }
     
 }

}
