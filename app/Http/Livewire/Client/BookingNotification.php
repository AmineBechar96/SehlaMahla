<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

use Illuminate\Support\Facades\Notification;
use App\Models\Client\Booking;
use App\Notifications\BookingHasBeenRescheduled;
use App\Notifications\JobDone;
use App\Events\CompletedBooking;

use App\Models\services\Service;
use App\Models\User;

use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;

class BookingNotification extends Component
{

    public $bookingId;
    public $notificationId;
    public $booking_time ;
    public $booking_date ;
    public $notif_type ;

    public function mount($id ,$notif)
    {
        $this->bookingId=$id;
        $this->notificationId=$notif;
        if(auth()->user()->unreadNotifications->where('id', $this->notificationId)->first()){
        $this->notif_type=auth()->user()->unreadNotifications->where('id', $this->notificationId)->first()->type;
       }
    }
    public function render()
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
        $notif=auth()->user()->unreadNotifications->where('id', $this->notificationId)->first();
       
     //  dd($notif);
        if($notif){
       
            $booking= Booking::where('id',$this->bookingId)->where('user_id',auth()->user()->id)->first();
        if($booking){
            //mark the notification as read
            $notif->markAsRead();
            return view('livewire.client.booking-notification',['booking'=>$booking]);

            
        }
         else{
            return  view('error-404');
         }
       
    }
    else{
       
        return view('livewire.client.booking-notification');
    }
}
else{
    return view('livewire.client.booking-notification');
}
}
 /**
* update any booking
* take the id of the booking as parameter
*/
public function updateBooking($booking_id)
{ 
    
if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){

// get the updated booking 
$booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->first();
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
    $this->dispatchBrowserEvent('somethingwrong');
}
}
}

       /**
 * accept booking
 * take id of booking as parameter
 */
public function start($booking_id)
{
if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
  // get the updated booking 
$booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->first();
if($booking){

   //update the status of the booking
   $booking->update(['status'=>'ongoing']);

  //successfuly updated alert
$this->dispatchBrowserEvent('swal:started', [
    'position'=> 'top-end',
    'type'=> 'success',
    'title'=> 'Votre Service à Commensé Maintenant',
    'showConfirmButton'=> false,
    'timer'=> 3000,
    'confirmButtonClass'=> 'btn btn-primary',
    'buttonsStyling'=> false,
    ]);
    
  return redirect('client/ongoing/bookings');
}
else{
    $this->dispatchBrowserEvent('somethingwrong');
}
}
}
   /**
 * finish booking
 * take id of booking as parameter
 */
public function finish($booking_id)
{
if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){
   // get the updated booking 
$booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->first();
if($booking){

    //update the booking
   $booking->update(['status'=>'completed']);
   //show the greating modal
   $this->dispatchBrowserEvent('swal:showGreatingMessage2');
  
   //notify the service provider that you job is done
  
   $booked_service=Service::find($booking->service_id);
   $provider=$booked_service->user()->get();
   Notification::send($provider, new JobDone($booked_service,$booking_id));


//add points to client and provider
CompletedBooking::dispatch($booking);
//suggest shippers

//call shippers
$this->suggestShippers($booking);
}
else{
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
