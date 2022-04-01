<?php

namespace App\Http\Livewire\Client;
use App\Models\AllServices;
use App\Models\services\MyLikedService;
use App\Models\services\MyService;
use App\Models\services\Service;

use App\Models\Wilaya;
use App\Models\Communes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;



class SelectedService extends Component
{
    protected $listeners = ['deleteIt' => 'remove'];

    use WithPagination;
    public $website;
    public $rating;
    public $phone;
    public $ouvert;

    public $wilaya_id=0;
    public $type;
    public $liked="saved"; 
    
    //public $serviceIdBeingRemoved=null;
    //public $serviceTypeBeingRemoved=null;
    public $search ;
    public $isSetClicked=false;
    public $likeed=false;
    public $agencyLikedId=null;
    public $agencyLikedType=null;
    public $filter="title" ;
   public $user_id;
  
  

 protected $paginationTheme = 'bootstrap';
  /**
     *  Livewire Lifecycle Hook
     */
    
    public function searchagency()
    {
        $this->gotoPage(1);
        
    }
   

          public function clearFilters()
          {
            
              $this->reset(['website','rating','phone','type','ouvert','filter']);
      
             
          }
    public function hydrate()
    {
        $this->emit('select2');
       
 
    }

 

public function remove($service_id)
{
    if(Auth::user()->hasVerifiedEmail() && Gate::allows('isClient') and Gate::allows('isActive')){
    //$user_id=Auth::user()->id;
    //$id=MyService::select('id')->where('user_id',Auth::user()->id)->where('agency_id',$agency_id)->where('agency_type',$agency_type)->first();

    $exisitingService=MyService::where('user_id',Auth::user()->id)->where('service_id',$service_id)->first();
   if($exisitingService){
    $exisitingService->delete();
    //$this->render();
    
    $this->dispatchBrowserEvent('swal:existed', [
        'position'=> 'top-end',
        'type'=> 'success',
        'title'=> 'Suppression terminer avec success',
        'showConfirmButton'=> false,
        'timer'=> 3000,
        'confirmButtonClass'=> 'btn btn-primary',
        'buttonsStyling'=> false,
    ]);
  
   }
  


}
//dd('ok');

}

    public function render()
    {
       
            
  if(Auth::user()->hasVerifiedEmail() && Gate::allows('isClient') and Gate::allows('isActive')){
    
    return view('livewire.client.selected-service', [


            'services' => Service::whereHas('hasBeenSaved', function ( $query) {
                $query->where('user_id',Auth::user()->id);
            })->where(function($sub_query) {
                $sub_query->where('title' ,'like' ,'%'.trim($this->search).'%');
                
            })->when($this->type,function ($query){
                return $query->where('type_id' ,$this->type);
            })->when($this->website, function($query){
                return $query->whereNotNull('website');
        })->when($this->phone, function($query){
            return $query->whereNotNull('phone');
        })->when($this->rating, function($query){
            return $query->whereHas('ratings');
        })->when($this->ouvert, function($query){
            return $query->whereHas('schedule', function ( $query) {
                $query->where('days_of_service','like', "%".Carbon::now()->locale('fr_FR')->dayName."%")

                ->where(\DB::raw("STR_TO_DATE(hour_of_starting,'%h:%i:%p')"),'<',Carbon::now()->toTimeString() )
                ->where(\DB::raw("STR_TO_DATE(hour_of_closing,'%H:%i:%p')"),'>',Carbon::now()->toTimeString() );
            });
        })->when($this->filter=="title",function($query){
                return $query->orderBy('title','asc');

            }) ->when($this->filter=="distance",function($query){
               return $query->orderBy('distance','asc');
            })->paginate(6)
        ,'types' => Service:: with('hasBeenSaved','type')->distinct('types.name')->join('my_services','services.id','=', 'my_services.service_id')->join('types','services.type_id','=', 'types.id')
        ->where('my_services.user_id',Auth::user()->id)->paginate(6),
        'withwebsite'=>Service::whereHas('hasBeenSaved', function ( $query) {
            $query->where('user_id',Auth::user()->id);
        })->whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
        ->when($this->type,function ($query){
            return $query->where('type_id' ,$this->type);
        })->count(),
        'withrating'=>Service::whereHas('hasBeenSaved', function ( $query) {
            $query->where('user_id',Auth::user()->id);
        })->whereHas('ratings')->where('title','like', '%'.trim($this->search).'%')
        ->when($this->type,function ($query){
            return $query->where('type_id' ,$this->type);
        })->count(),
        'withphone'=>Service::whereHas('hasBeenSaved', function ( $query) {
            $query->where('user_id',Auth::user()->id);
        })->whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
        ->when($this->type,function ($query){
            return $query->where('type_id' ,$this->type);
        })
        ->count(),
        'withopenstate'=>Service::whereHas('hasBeenSaved', function ( $query) {
            $query->where('user_id',Auth::user()->id);
        })->whereHas('schedule', function ( $query) {
            $query->where('days_of_service','like', "%".Carbon::now()->locale('fr_FR')->dayName."%")
            ->where(\DB::raw("STR_TO_DATE(hour_of_starting,'%h:%i:%p')"),'<',Carbon::now()->toTimeString() )
            ->where(\DB::raw("STR_TO_DATE(hour_of_closing,'%H:%i:%p')"),'>',Carbon::now()->toTimeString() );
        })->where('title','like', '%'.trim($this->search).'%')
        ->when($this->type,function ($query){
            return $query->where('type_id' ,$this->type);
        })
    ->count(),
    'ratings'=>Service::whereHas('hasBeenSaved', function ( $query) {
        $query->where('user_id',Auth::user()->id);
    })->join('ratings','services.id','=', 'ratings.service_id')->select(\DB::raw('(CASE WHEN number_of_starts  BETWEEN 4.0 AND 5.0 THEN "best"
    WHEN number_of_starts BETWEEN 3.0 AND 4.0 THEN "good"
    WHEN number_of_starts BETWEEN 2.0 AND 3.0 THEN "medium"
    WHEN number_of_starts BETWEEN 1.0 AND 2.0 THEN "bad"
    WHEN number_of_starts  BETWEEN 0 AND 1.0 THEN "verybad"
    ELSE "others" END)  as rate'), \DB::raw('count(1) as count'))
    ->groupBy('rate')
    ->orderBy('count','desc')
    ->get(),
    
    'total'=>Service::whereHas('hasBeenSaved', function ( $query) {
        $query->where('user_id',Auth::user()->id);
    })->where('title','like', '%'.trim($this->search).'%')
    ->when($this->website, function($query){
            return $query->whereNotNull('website');
    })->when($this->phone, function($query){
        return $query->whereNotNull('phone');
    })->when($this->rating, function($query){
        return $query->join('ratings', 'services.id', '=', 'ratings.service_id');
    })->when($this->ouvert, function($query){
        return $query->join('schedules', 'services.id', '=', 'schedules.service_id')->where(\DB::raw("STR_TO_DATE(hour_of_starting,'%h:%i:%p')"),'<',Carbon::now()->toTimeString() )
        ->where(\DB::raw("STR_TO_DATE(hour_of_closing,'%H:%i:%p')"),'>',Carbon::now()->toTimeString() );
    })->count(),
        
        ]);
    
      
        

}     



}

 /**
     * 
     * like service
     */
    public function addLike($service_id){
        if(auth()->user()->hasVerifiedEmail() && Gate::allows('isClient') and Gate::allows('isActive')){
        $exisitingService=MyService::where('user_id',Auth::user()->id)->where('service_id',$service_id)->first();
            if($exisitingService){
        auth()->user()->likes()->toggle($service_id);
        }
        else{
            //something wrong
            $this->dispatchBrowserEvent('somethingwrong');
        }
    }
        //else maybe a flash message
    } 
}
 