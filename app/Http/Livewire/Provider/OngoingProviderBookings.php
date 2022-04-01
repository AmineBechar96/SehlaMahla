<?php

namespace App\Http\Livewire\Provider;

use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Notifications\Client\BookingHasBeenFinished;
use App\Models\User;
use App\Models\Provider\Client;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Notification;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class OngoingProviderBookings extends Component
{




    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $client_id;
    public $client_name;
    public $client_phone;
    public $client_address;
    public $client_email;
    public $loaded_client_name;
    public $service_id;
    public $services_id;
public $kh;
    public $date;


 
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
        return view('livewire.provider.ongoing-provider-bookings',
        ['bookings'=>Booking::where('status','ongoing')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)
        ->when($this->date=="yesterday", function($query){
            $query->where('created_at','>=', Carbon::now()->subDays(1));
            })->when($this->date=="lastweek", function($query){
                $query->where('created_at','>=', Carbon::now()->subDays(7));
                })
            ->when($this->date=="lastmonth", function($query){
                    $query->where('created_at','>=', Carbon::now()->subMonth(1));
                    })->latest()->paginate(2),
        'number_of_bookings'=>Booking::with('service')->whereIn('service_id',$services)->count(),
        'number_of_bookings_ongoing'=>Booking::with('service')->where('status','ongoing')->whereIn('service_id',$services)->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('status','ongoing')->whereIn('service_id',$services)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_client'=>Booking::distinct('user_id')->whereIn('service_id',$services)->count(),
        
        'total'=>Booking::where('status','ongoing')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)->count()]);
    }
    }


          /**
 * finish booking
 * take id of booking as parameter
 */
 public function finishService($booking_id)
 {
 if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){
     //get the booking to finish
    $booking=Booking::where('id',$booking_id)->whereIn('service_id',$this->services_id)->first();
    if($booking){
    //get the name of the client
    $this->loaded_client_name=$booking->user->name;
  
     
    
     
     //notify the client your service provider want to finish the service
    $client=User::findOrFail($booking->user_id);
    Notification::send($client, new BookingHasBeenFinished($booking));

   //the notification has been sent 
     $this->dispatchBrowserEvent('swal:ServiceDonee');
}
 }
 else{
     //something wrong
      $this->dispatchBrowserEvent('somethingwrong');
 }
}


/**
 * add a user to be an official client
 */
public function addClient($client_id,$booking_id)
{
    $booking=Booking::where('user_id',$client_id)->where('id',$booking_id)->whereIn('service_id',$this->services_id)->first();
    if($booking){
        $this->client_id=$booking->user_id;
        $this->client_name=$booking->user->name;

        $this->service_id=$booking->service_id;
       $this->dispatchBrowserEvent('addclient');
        ;
    }
    else{
        //something wrong
         $this->dispatchBrowserEvent('somethingwrong');
    }
}

/**
 * save the client
 */
public function saveClient()
{
    $client=Client::where('user_id',$this->client_id)->where('service_id',$this->service_id)->first();
  
    if($client){
       
 $this->dispatchBrowserEvent('alreadyclient');
    }
    else{
$this->validate([
    'client_address'=>'string|required|min:20|max:40',
    'client_phone'=>['required', 'regex:/^(((07)|(05)|(06))[0-9]{8})|((02)[0-9]{7})/','min:9','max:10'],
    'client_email'=>'email:rfc,dns|nullable',
]);


//store data in client table
$storedServiceData=array(
    'service_id'=>$this->service_id,
    'user_id'=>$this->client_id,
    'name'=>$this->client_name,
    'phone'=>$this->client_phone,
    'email'=>$this->client_email,
    'address'=>$this->client_address,                       
);
//store
Client::create($storedServiceData);
$this->render();

//send success alert
$this->dispatchBrowserEvent('addclientsuccess');

//close the modal
$this->dispatchBrowserEvent('closeaddclient');
    }
}
}
