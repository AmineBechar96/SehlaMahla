<?php

namespace App\Http\Livewire\Provider;

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
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){
            $services=Service::where('user_id',auth()->user()->id)->pluck('id')->toArray();
            return view('livewire.provider.bookings-list',[
            'bookings'=>Booking::with('service')->whereIn('service_id',$services)
           
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
            ->whereIn('service_id',$services)
            ->get(),
            'pending'=>Booking::where('status','pending')->whereIn('service_id',$services)
            ->count(),
            'accepted'=>Booking::where('status','accepted')->whereIn('service_id',$services)
            ->count(),
            'ongoing'=>Booking::where('status','ongoing')->whereIn('service_id',$services)
            ->count(),
            'completed'=>Booking::where('status','completed')->whereIn('service_id',$services)
            ->count(),
            'canceled'=>Booking::where('status','canceled')->whereIn('service_id',$services)
            ->count(),
            'rejected'=>Booking::where('status','rejected')->whereIn('service_id',$services)
            ->count(),
            
        ]);
    }
    else{
        return view('home');
    }
}
}
