<?php

namespace App\Http\Livewire\Provider;

use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Notifications\Client\BookingHasBeenStarted;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
class AcceptedProviderBookings extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $loaded_client_name_to_start ;
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
        //dd($services);
        return view('livewire.provider.accepted-provider-bookings',
        ['bookings'=>Booking::where('status','accepted')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)
        ->when($this->date=="yesterday", function($query){
            $query->where('created_at','>=', Carbon::now()->subDays(1));
        })->when($this->date=="lastweek", function($query){
                $query->where('created_at','>=', Carbon::now()->subDays(7));
        })->when($this->date=="lastmonth", function($query){
                    $query->where('created_at','>=', Carbon::now()->subMonth(1));
                    })
        ->latest()->paginate(2),
        'number_of_bookings'=>Booking::with('service')->whereIn('service_id',$services)->count(),
        'number_of_bookings_accepted'=>Booking::with('service')->where('status','accepted')->whereIn('service_id',$services)->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('status','accepted')->whereIn('service_id',$services)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_client'=>Booking::distinct('user_id')->whereIn('service_id',$services)->count(),
        'total'=>Booking::where('status','accepted')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)->count(),
        ]);
    }}



       /**
 * accept booking
 * take id of booking as parameter
 */
 public function start($booking_id)
 {
 if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){
     //get the booking
    $booking=Booking::where('id',$booking_id)->whereIn('service_id',$this->services_id)->first();
    if($booking){
    //get the name of the client
    $this->loaded_client_name_to_start = $booking->user->name;


    //the notificatio nhas been sent 
    $this->dispatchBrowserEvent('swal:clientNotified');
    $this->gotoPage(1);
    // send notification to client your booking has been accepted
    $client=User::findOrFail($booking->user_id);
     Notification::send($client, new BookingHasBeenStarted($booking));
 }}
 else{
     //something wrong
     $this->dispatchBrowserEvent('somethingwrong');
 }
}
}
