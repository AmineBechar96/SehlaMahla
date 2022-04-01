<?php

namespace App\Http\Livewire\Client;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;


use App\Models\services\Service;
use Illuminate\Support\Facades\Notification;

use App\Models\Client\Booking;
use App\Notifications\BookingHasBeenRescheduled;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;

class AcceptedBookings extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $booking_time ;
    public $booking_date ;
    public $loaded_booking_id;
    public $date;
    public function mount(){
        
    }
    public function searchagency()
    {
        $this->gotoPage(1);
        
    }

     /**
 * load the data to of the booking to be updated
 * take the id as parameter
 */
public function loadData($booking_id)
{
   
    $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','accepted')->first();
    if($booking){
 //reset errors and all proprieties
    $this->resetErrorBag();
    $this->reset();
    //asign proprieties
     $this->loaded_booking_id=$booking->id;
    }
    else{
        //something wrong
        $this->dispatchBrowserEvent('somethingwrong');
    }
} 
    
    public function render()
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
        return view('livewire.client.accepted-bookings',
        ['bookings'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','accepted')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->when($this->date=="yesterday", function($query){
            $query->where('created_at','>=', Carbon::now()->subDays(1));
            })->when($this->date=="lastweek", function($query){
                $query->where('created_at','>=', Carbon::now()->subDays(7));
                })
            ->when($this->date=="lastmonth", function($query){
                    $query->where('created_at','>=', Carbon::now()->subMonth(1));
                    })->latest()->paginate(2),
        'number_of_bookings'=>Booking::with('service')->where('user_id',auth()->user()->id)->count(),
        'number_of_bookings_accepted'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','accepted')->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('user_id',auth()->user()->id)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_communes'=>Service::distinct('commune_id')->join('bookings','services.id','=','bookings.service_id')->where('bookings.user_id',auth()->user()->id)->count(),
        'total'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','accepted')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->count()
        ]
    );
}
else{
    return redirect('home');
}
}
 
/**
* update any booking
* take the id of the booking as parameter
*/
  public function updateBooking($booking_id)
  { 
      
  if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){

   //get the booking
   $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','accepted')->first();
   if($booking){
// date and time validation
$this->validate([
   'booking_date'=>'required|date|after_or_equal:today',
   'booking_time'=>'required|date_format:H:i',
   ]);

//data to be updated
$updatedBookingData=array(
       'booking_date'=>$this->booking_date,
       'booking_time'=>$this->booking_time,
           ); 

//update the booking
$booking->update($updatedBookingData);

//successfuly updated alert
$this->dispatchBrowserEvent('swal:rescheduled', [
'position'=> 'top-end',
'type'=> 'success',
'title'=> 'Votre Réservation à été replanifier avec success',
'showConfirmButton'=> false,
'timer'=> 3000,
'confirmButtonClass'=> 'btn btn-primary',
'buttonsStyling'=> false,
]);

//rerender the page to see the changes
$this->render();

//close the modal
$this->dispatchBrowserEvent('swal:closeUpdatedBookingModal');

//send notification to the service provider

    $booked_service=Service::find($booking->service_id);
    $provider=$booked_service->user()->get();
    Notification::send($provider, new BookingHasBeenRescheduled($booked_service,$booking_id));




   }
   else{
      // something wrong
   }
}

}

}
