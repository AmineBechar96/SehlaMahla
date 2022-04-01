<?php

namespace App\Http\Livewire\Provider;

use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Models\User;
use Carbon\Carbon;

use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class CanceledProviderBookings extends Component
{



    

    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    
    public $loaded_client_name_to_finish ;
    
    public $date;


 
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
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){

            $services=Service::where('user_id',auth()->user()->id)->pluck('id')->toArray();
            return view('livewire.provider.canceled-provider-bookings',
        ['bookings'=>Booking::where('status','canceled')->where(function($sub_query) {
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
        'number_of_bookings_canceled'=>Booking::with('service')->where('status','canceled')->whereIn('service_id',$services)->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('status','canceled')->whereIn('service_id',$services)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_client'=>Booking::distinct('user_id')->whereIn('service_id',$services)->count(),
        'total'=>Booking::where('status','canceled')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)->count()
        ]);
    }
    }
}
