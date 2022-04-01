<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\services\Service;

use App\Models\Client\Booking;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class BookingsList extends Component
{
    public $bookingStatus;
    public $bookingIdsDetails;

public $bookingsId=[];

    
    public function render()
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){

        return view('livewire.client.bookings-list',[
            'bookings'=>Booking::with('service')->where('user_id',auth()->user()->id)
            ->when($this->bookingStatus=='pending',function($query){
                return $query->where('status','pending');
            })
            ->when($this->bookingStatus=='ongoing',function($query){
                return $query->where('status','ongoing');
            })
            ->when($this->bookingStatus=='completed',function($query){
                return $query->where('status','completed');
            })
            ->when($this->bookingStatus=='canceled',function($query){
                return $query->where('status','canceled');
            })
            ->when($this->bookingStatus=='accepted',function($query){
                return $query->where('status','accepted');
            })
            ->when($this->bookingStatus=='rejected',function($query){
                return $query->where('status','rejected');
            })
            ->get(),
            'pending'=>Booking::where('user_id',auth()->user()->id)
            ->where('status','pending')->count(),
            'accepted'=>Booking::where('user_id',auth()->user()->id)
            ->where('status','accepted')->count(),
            'ongoing'=>Booking::where('user_id',auth()->user()->id)
            ->where('status','ongoing')->count(),
            'completed'=>Booking::where('user_id',auth()->user()->id)
            ->where('status','completed')->count(),
            'canceled'=>Booking::where('user_id',auth()->user()->id)
            ->where('status','canceled')->count(),
            'rejected'=>Booking::where('user_id',auth()->user()->id)
            ->where('status','rejected')->count(),
            
        ]);
    }
    else{
        return redirect('home');
    }
    }
    public function cancel()
    {
       if(empty($this->bookingsId)){
           dd('select a booking');
       }
       else{
dd('you sure about that');
       }
    }
    public function finish()
    {
       if(empty($this->bookingsId)){
           dd('select a booking');
       }
       else{
           dd('you sure about that');
       }
    }
    
    
}
