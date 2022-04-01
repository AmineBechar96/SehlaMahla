<?php

namespace App\Http\Livewire\Client;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Models\services\Service;
use App\Events\CompletedBooking;
use App\Notifications\JobDone;
use Illuminate\Support\Facades\Notification;


use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class OngoingBookings extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $loaded_booking_id_to_finish ;
    public $loaded_booking_service_to_finish ;
    public $loaded_booking_title_to_finish ;
    public $booking_time ;
    public $booking_date ;
    public $loaded_booking_id;
    public $shippers;
    public $date;
        public function mount(){
        $this->shippers=[];
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
    //reset errors and all proprieties
    $this->resetErrorBag();
    $this->reset();
   // get the booking
   $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','ongoing')->first();
   if($booking){
    //asign proprieties
     $this->loaded_booking_id=$booking->id;
     } 
     else{
          //something wrong
        $this->dispatchBrowserEvent('somethingwrong');
     }
    
    }
    /**
 * load the data to of the booking to be finished
 * take the id as parameter
 */
public function loadDataToFinish($booking_id)
{
    //reset errors and all proprieties
     $this->resetErrorBag();
     $this->reset();
    //get the booking
    $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','ongoing')->first();
    if($booking){
    //asign proprieties
     $this->loaded_booking_title_to_finish =$booking->title;
     $this->loaded_booking_service_to_finish=$booking->service->title;
     $this->loaded_booking_id_to_finish =$booking->id;
     $this->dispatchBrowserEvent('swal:showConfirmFinish');
    }
    else {
        //something wrong
        $this->dispatchBrowserEvent('somethingwrong');
    }
   
}
    public function render()
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
        return view('livewire.client.ongoing-bookings',
        ['bookings'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','ongoing')->where(function($sub_query) {
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
        'number_of_bookings_ongoing'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','ongoing')->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('user_id',auth()->user()->id)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_communes'=>Service::distinct('commune_id')->join('bookings','services.id','=','bookings.service_id')->where('bookings.user_id',auth()->user()->id)->count(),
        'total'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','ongoing')->where(function($sub_query) {
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
 * cancel booking
 * take id of booking as parameter
 */
 public function finish($booking_id)
 {
 if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
     //get the id of the booking
     $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','ongoing')->first();
     if($booking){     //update the booking
    $booking->update(['status'=>'completed']);
    
    //go back the first page
    $this->gotoPage(1);
    //notify the service provider that you service is done
    $booked_service=Service::find($booking->service_id);
    $provider=$booked_service->user()->get();
    Notification::send($provider, new JobDone($booked_service,$booking_id));

    //add points to client and provider
    CompletedBooking::dispatch($booking);
    //event(new CompletedBooking($booking));


    //suggest shippers
    //call shippers
    $this->suggestShippers($booking);
     }
     else{
         //something wrong
         $this->dispatchBrowserEvent('somethingwrong');
     }
 }

     
 }

 /**
  * return some shipping services related to the same area
  */
   
  public function suggestShippers(Booking $booking)
  {
     //find the service 
    $service=Service::findOrFail($booking->service_id);

    //list of service that need shipping
    $list=[93,92,78,77,76,75,74,72,65,64,54,53,27,26,16,14];
    //check for the service commune and type
    if(in_array($service->type_id,$list)  and $service->shipping==false){
    $this->shippers=Service::select('services.*','ratings.number_of_starts','services.id as serviceID')->join('users', 'services.user_id', '=', 'users.id')
    ->join('ratings', 'services.id', '=', 'ratings.service_id')->join('points', 'users.id', '=', 'points.user_id')
    ->where('commune_id',$service->commune_id)->whereIn('type_id',[84,85,86,87,88])
    ->orderBy('points.number_of_points','desc')
    ->take(10)->get()->toArray();
    //dd($this->shippers);
    if ($this->shippers) {
    //show shipper modal
    $this->dispatchBrowserEvent('swal:showShipperModal');
    }
    } else {
        $this->shippers=[];
        //show the greating modal
        $this->dispatchBrowserEvent('swal:showGreatingMessage');
    }
    
    
  }
  /**
   * close shippers modal and show greating message
   */
public function closeShipper()
{
    //close shipper modal
    $this->dispatchBrowserEvent('swal:closeShipperModal');
     //show the greating modal
     $this->dispatchBrowserEvent('swal:showGreatingMessage');

}

/**
 * redirect to shipper service 
 */
public function redirectToShipper($id)
{
   $service=Service::findOrFail($id);
   $type=$service->type->name;

   return redirect('client/'.$type.'/agency-details/'.$id);
}
}
