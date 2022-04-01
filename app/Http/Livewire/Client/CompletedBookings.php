<?php

namespace App\Http\Livewire\Client;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\Client\Booking;
use App\Models\services\Service;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use App\Models\Report;

class CompletedBookings extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
    public $booking_to_be_reported=null;
    public $description=1;
    public $date;
        public function mount(){
        
    }
    public function searchagency()
    {
        $this->gotoPage(1);
        
    }
    public function render()
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isClient') and Gate::allows('isActive')){

        return view('livewire.client.completed-bookings',
        ['bookings'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','completed')->where(function($sub_query) {
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
        'number_of_bookings_completed'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','completed')->count(),
        'number_of_services'=>Booking::distinct('service_id')->where('user_id',auth()->user()->id)->count(),
        'badge_color'=>auth()->user()->points->badge_color,

        'number_of_communes'=>Service::distinct('commune_id')->join('bookings','services.id','=','bookings.service_id')->where('bookings.user_id',auth()->user()->id)->count(),
        
        'total'=>Booking::with('service')->where('user_id',auth()->user()->id)->where('status','completed')->where(function($sub_query) {
            $sub_query->where('title','like', '%'.trim($this->search).'%');
        })->count()]
    );
    }
    else{
        return redirect('home');
    }
}


/**
 * show report modal
 */
public function showReportModal($booking_id)
{

    $booking=Booking::where('id',$booking_id)->where('user_id',auth()->user()->id)->where('status','completed')->first();
  
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
 $previous_report=Report::where('booking_id',$this->booking_to_be_reported->id)
    ->where('reporter_id',auth()->user()->id)->first();
    if(is_null($previous_report)){
//dd($this->booking_to_be_reported->service->user->id);
    Report::create([
        'reporter_id'=>auth()->user()->id,
        'reported_id'=>$this->booking_to_be_reported->service->user->id,
        'booking_id'=>$this->booking_to_be_reported->id,
        'description'=>$this->description,
    ]);

     //discount some points from the reported client
     $points=Point::where('user_id',$this->booking_to_be_reported->service->user->id);
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
