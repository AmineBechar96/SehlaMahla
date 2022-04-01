<?php

namespace App\Http\Livewire\Provider;

use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Models\User;
use App\Models\Report;
use App\Models\Point;
use Carbon\Carbon;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class CompletedProviderBookings extends Component
{


    

    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $description=1;
    public $loaded_client_name_to_finish ;
    public $booking_to_be_reported=null;
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
            return view('livewire.provider.completed-provider-bookings',
        ['bookings'=>Booking::where('status','completed')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)->when($this->date=="yesterday", function($query){
            $query->where('created_at','>=', Carbon::now()->subDays(1));
            })->when($this->date=="lastweek", function($query){
                $query->where('created_at','>=', Carbon::now()->subDays(7));
                })
            ->when($this->date=="lastmonth", function($query){
                    $query->where('created_at','>=', Carbon::now()->subMonth(1));
                    })->latest()->paginate(2),
        'number_of_bookings'=>Booking::with('service')->whereIn('service_id',$services)->count(),
        'number_of_bookings_completed'=>Booking::with('service')->where('status','completed')->whereIn('service_id',$services)->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('status','completed')->whereIn('service_id',$services)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_client'=>Booking::distinct('user_id')->whereIn('service_id',$services)->count(),
        'total'=>Booking::where('status','completed')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->whereIn('service_id',$services)->count()
        ]);
    }




    }
    /**
     * show report modal
     */
    public function showReportModal($booking_id)
    {

        $booking=Booking::where('id',$booking_id)->whereIn('service_id',$this->services_id)->first();
    if($booking){
        $this->booking_to_be_reported=$booking;
        $this->dispatchBrowserEvent('report');
    }
    else{
        //something wrong
        $this->dispatchBrowserEvent('somethingwrong');
    }

    }

    /**
     * report a client 
     */

    public function report()
    {


if ($this->description==1) {
    $this->description="no appearance or response from the client";
} 
elseif($this->description==2){
    $this->description="client did not pay the full charge";
}
elseif($this->description==3){
    $this->description="inappropriate client behaviour";
}
elseif($this->description==4){
    $this->description="the customer has not respected the prior agreement";
}

$this->validate([
    'description'=>'required|string|min:20',
]);



if ($this->booking_to_be_reported) {
    $previous_report=Report::where('booking_id',$this->booking_to_be_reported->id)->where('reporter_id',auth()->user()->id)->first();
    if(is_null($previous_report)){

        Report::create([
            'reporter_id'=>auth()->user()->id,
            'reported_id'=>$this->booking_to_be_reported->user_id,
            'booking_id'=>$this->booking_to_be_reported->id,
            'description'=>$this->description,
        ]);

        //discount some points from the reported client
        $points=Point::where('user_id',$this->booking_to_be_reported->user_id);
        $points->decrement('number_of_points',1);

         //show alert your report has been saved
        $this->dispatchBrowserEvent('reportsaved');
    }
    else{
        //show alert your report has been saved
        $this->dispatchBrowserEvent('reportexist');
    }
            

       

        } 
        
        
    }
}
