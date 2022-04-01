<?php

namespace App\Http\Livewire\Client;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class CanceledBookings extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $date;
        public function mount(){
        
    }
    public function searchagency()
    {
        $this->gotoPage(1);
        
    }
    public function render()
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isClient')){

        return view('livewire.client.canceled-bookings',
        ['bookings'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','canceled')->where(function($sub_query) {
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
        'number_of_bookings_canceled'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','canceled')->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('user_id',auth()->user()->id)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_communes'=>Service::distinct('commune_id')->join('bookings','services.id','=','bookings.service_id')->where('bookings.user_id',auth()->user()->id)->count(),
        'total'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','canceled')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->count()
        ]

    );
    }
    else{
        return redirect('home');
    }
}

}
