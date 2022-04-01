<?php

namespace App\Http\Livewire\Client;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Events\CanceledBooking;
use Carbon\Carbon;

class PendingBookings extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $booking_title ;
    public $loaded_booking_id ;
    public $loaded_booking_id_to_cancel ;
    public $loaded_booking_service_to_cancel ;
    public $loaded_booking_title_to_cancel ;
    public $booking_address ;
    public $booking_time ;
    public $booking_date ;
    public $booking_description ;
    public $aboutDate ;
    public $open=false ;
    public $date;
    /**
 * load the data to of the booking to be updated
 * take the id as parameter
 */
public function loadData($booking_id)
{
   // get the booking
    $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','pending')->first();
    if($booking){
    //asign proprieties
     $this->booking_title =$booking->title;
     $this->loaded_booking_id=$booking->id;
     $this->booking_address =$booking->address;
     $this->aboutDate ="same";
     
     
     $this->booking_description =$booking->description;
     $this->dispatchBrowserEvent('loadUpdatedData');
}
    else{
   //something went wrong
   $this->dispatchBrowserEvent('somethingwrong');
    }
}
/**
 * load the data to of the booking to be canceled
 * take the id as parameter
 */
public function loadDataToCancel($booking_id)
{
   // get the booking
   $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','pending')->first();
   if($booking){
    //asign proprieties
     $this->loaded_booking_title_to_cancel =$booking->title;
     $this->loaded_booking_service_to_cancel=$booking->service->title;
     $this->loaded_booking_id_to_cancel =$booking->id;
     $this->dispatchBrowserEvent('confirmCancel');

    }
    else{
   //something went wrong
   $this->dispatchBrowserEvent('somethingwrong');
    }
}
public function mount(){
        
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
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
            return view('livewire.client.pending-bookings',
            ['bookings'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','pending')
            ->where(function($sub_query) {
                $sub_query->where('title','like', '%'.trim($this->search).'%');
            })->when($this->date=="yesterday", function($query){
            $query->where('created_at','>=', Carbon::now()->subDays(1));
            })->when($this->date=="lastweek", function($query){
                $query->where('created_at','>=', Carbon::now()->subDays(7));
                })
            ->when($this->date=="lastmonth", function($query){
                    $query->where('created_at','>=', Carbon::now()->subMonth(1));
                    })
            ->latest()->paginate(2),
            'number_of_bookings'=>Booking::with('service')->where('user_id',auth()->user()->id)->count(),
            'number_of_bookings_pending'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','pending')->count(),
            'number_of_services'=>Booking::distinct('service_id')->where('user_id',auth()->user()->id)->count(),
            'badge_color'=>auth()->user()->points->badge_color,
    
            'number_of_communes'=>Service::distinct('commune_id')->join('bookings','services.id','=','bookings.service_id')
            ->where('bookings.user_id',auth()->user()->id)->count(),
            'total'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','pending')->where(function($sub_query) {
                $sub_query->where('title','like', '%'.trim($this->search).'%');
            })->count(),
            ]
        );
        }
        else{
            return redirect('home');
        }
        
    }
/**
 * cancel booking
 * take id of booking as parameter
 */
 public function cancel($booking_id)
    {
    if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient')){

   // get the booking
   $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','pending')->first();
   if($booking){
        //update the booking
       $booking->update(['status'=>'canceled']);
       //go back the first page
       $this->gotoPage(1);

       //remove points to client 
       CanceledBooking::dispatch($booking);
    }
    else{
   //something went wrong
   $this->dispatchBrowserEvent('somethingwrong');
    }
    }

        
    }

/**
 * update any booking
 * take the id of the booking as parameter
 */
   public function updateBooking($booking_id)
    { 
        
if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
// get the booking
$booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->first();
if($booking){

//validate the data in the form    
$this->validate([
            'booking_title'=>'string|required',
            'booking_address'=>'string|required',
            'aboutDate'=>'string|required',
            'booking_description'=>'required|string',
        ]);

// if the user keep the same date of the booking
if($this->aboutDate=="same"){
     $updatedBookingData=array(
    'title'=>$this->booking_title,
    'address'=>$this->booking_address,
    'description'=>$this->booking_description,
    ); }

//if the user change the date of the booking    
 elseif($this->aboutDate=="change"){
//add date and time validation
$this->validate([
    'booking_date'=>'required|date|after_or_equal:today',
    'booking_time'=>'required|date_format:H:i',
    ]);
$updatedBookingData=array(
    'title'=>$this->booking_title,
    'address'=>$this->booking_address,
    'booking_date'=>$this->booking_date,
    'booking_time'=>$this->booking_time,
    'description'=>$this->booking_description,
        ); 
    }
else{
    return redirect('client/dashboard');
    }

//update the booking
 $booking->update($updatedBookingData);

//successfuly updated alert
 $this->dispatchBrowserEvent('swal:updated', [
'position'=> 'top-end',
'type'=> 'success',
'title'=> 'Votre Réservation à été modifier avec success',
'showConfirmButton'=> false,
'timer'=> 3000,
'confirmButtonClass'=> 'btn btn-primary',
'buttonsStyling'=> false,
 ]);

//rerender the page to see the changes
$this->render();

//reset date element 
$this->open=false;
$this->aboutDate="same";

//close the modal
$this->dispatchBrowserEvent('swal:closeUpdatedBookingModal');

    }
    else{
        //something went wrong
        $this->dispatchBrowserEvent('somethingwrong');
         }
}  
    }

   
      




}

