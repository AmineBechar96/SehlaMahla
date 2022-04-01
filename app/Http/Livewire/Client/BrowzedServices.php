<?php

namespace App\Http\Livewire\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

use App\Models\RentAgency;
use App\Models\Wilaya;
use App\Models\Communes;
use App\Models\services\MyLikedService;
use App\Models\services\MyService;
use App\Models\services\Service;
use App\Models\services\Schedule;
use App\Models\services\Rating;
use App\Notifications\ServiceAddingComplete;
use App\Notifications\ServicelikeComplete;
use Illuminate\Support\Facades\DB ;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;

class BrowzedServices extends Component
{
    use WithPagination;
    public $website=false;
    public $rating=false;
    public $phone=false;
    public $ouvert=false;
    public $wilaya_id=0;
    public $typeId;
    public $search ;
    public $selectedPosition;
  
    public $searchPosition ;
    public $filter="title" ;
    
           public $isSetClicked=false;
 public $liked=false;
 public $agencyLikedId=null;
 public $agencyLikedType=null;
public $wilayas;
public $communes;
public $selectedWilaya=NULL;
public $selectedCommune=NULL;
 protected $paginationTheme = 'bootstrap';
 protected $listeners = [
    'selectedCommunee',
];
    /**
     *  Livewire Lifecycle Hook
     */
    public function searchagency()
    {
        $this->gotoPage(1);
        
    }
   

    public function  mount($type){
        // get the type of the service
        $this->typeId=$type;
        $this->wilayas=Wilaya::all();
        
        $this->communes=collect();
     
      
    }

    /**
     * update wilaya and get communes
     */
    public function updatedSelectedWilaya($wilaya){
        if(!is_null($wilaya)){
        $this->communes=Communes::where('wilaya_id',$wilaya)->get();}
    }
   
  

          /**
           * clear all filters
           */
    public function clearFilters()
    {
      
        $this->reset(['website','rating','phone','ouvert','filter']);

       
    }
    /**
     * hydrate select2 event
     */
    public function hydrate()
    {
        $this->emit('select2');
       
 
    }

    
    public function render()
    {
       $today=Carbon::now()->locale('fr_FR')->dayName;
      
        if(Auth::user()->hasVerifiedEmail() && Gate::allows('isClient')){

           
        return view('livewire.client.browzed-services', [
            'services' => Service::with('ratings')->where('type_id',$this->typeId)->where(function($sub_query) {
                $sub_query->where('title','like', '%'.trim($this->search).'%');
            })->when($this->selectedCommune, function($query,$commune){
                return $query->where('commune_id',$commune);
            })->when($this->selectedPosition, function($query,$position){
                return $query->where('commune_id',Communes::select('id')->where('name',$position)->pluck('id'));
            })
            
            ->when($this->website, function($query){
                    return $query->whereNotNull('website');
            })->when($this->phone, function($query){
                return $query->whereNotNull('phone');
            })->when($this->rating, function($query){
                return $query->whereExists(function ($subquery) {
                    $subquery->select('*')
                          ->from('ratings')
                          ->whereColumn('ratings.service_id', 'services.id');
                });
            })->when($this->ouvert, function($query){
                return $query->select('services.*')->join('schedules', 'services.id', '=', 'schedules.service_id')
                ->where('days_of_service','like', "%".Carbon::now()->locale('fr_FR')->dayName."%")
                ->where(\DB::raw("STR_TO_DATE(hour_of_starting,'%h:%i:%p')"),'<',Carbon::now()->toTimeString() )
                ->where(\DB::raw("STR_TO_DATE(hour_of_closing,'%H:%i:%p')"),'>',Carbon::now()->toTimeString() )
                    ;
                    /*->when($this->filter=='reviews',function($query){
                        return $query->join('ratings','services.id','=', 'ratings.service_id')->orderByRaw('count(ratings.id) DESC')->paginate(6);
                     })-*/
            })->when($this->filter=='title',function($query){
                return $query->orderBy('title','asc');
             
            })->when($this->filter=='distance',function($query){
                return $query->orderBy('distance','asc');
             })
            ->when($this->filter=='rating',function($query){
               return $query->join('ratings','services.id','=', 'ratings.service_id')->select('services.*',\DB::raw('AVG(ratings.number_of_starts) as rat'))
               ->groupBy('ratings.service_id')->orderByRaw('AVG(ratings.number_of_starts) DESC');
            })->when($this->filter=='reviews',function($query){
                return $query->join('ratings','services.id','=', 'ratings.service_id')->select('services.*',\DB::raw('count(ratings.id) as rat'))
                ->groupBy('ratings.service_id')->orderByRaw('count(ratings.id) DESC');
             })
            ->paginate(6)
        ,'ratings'=>Service::where('type_id',$this->typeId)->join('ratings','services.id','=', 'ratings.service_id')
        ->select(\DB::raw('(CASE WHEN number_of_starts  BETWEEN 4.0 AND 5.0 THEN "best"
        WHEN number_of_starts BETWEEN 3.0 AND 4.0 THEN "good"
        WHEN number_of_starts BETWEEN 2.0 AND 3.0 THEN "medium"
        WHEN number_of_starts BETWEEN 1.0 AND 2.0 THEN "bad"
        WHEN number_of_starts  BETWEEN 0 AND 1.0 THEN "verybad"
        ELSE "others" END)  as rate'), \DB::raw('count(1) as count'))
        ->groupBy('rate')
        ->orderBy('count','desc')
        ->get(),
        
        
        
        'withwebsite'=>Service::where('type_id',$this->typeId)->whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')->when($this->selectedCommune, function($query,$commune){
            return $query->where('commune_id',$commune);
        })->when($this->selectedPosition, function($query,$position){
            return $query->where('commune_id',Communes::select('id')->where('name',$position)->pluck('id'));
        })->count(),
        'withrating'=>Service::where('type_id',$this->typeId)->join('ratings', 'services.id', '=', 'ratings.service_id')
        ->where('title','like', '%'.trim($this->search).'%')->when($this->selectedCommune, function($query,$commune){
            return $query->where('commune_id',$commune);
        })->when($this->selectedPosition, function($query,$position){
            return $query->where('commune_id',Communes::select('id')->where('name',$position)->pluck('id'));
        })->count(),
        'withphone'=>Service::where('type_id',$this->typeId)->whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')->when($this->selectedCommune, function($query,$commune){
            return $query->where('commune_id',$commune);
        })->when($this->selectedPosition, function($query,$position){
            return $query->where('commune_id',Communes::select('id')->where('name',$position)->pluck('id'));
        })->count(),
        
        'withopenstate'=>Service::where('type_id',$this->typeId)->join('schedules', 'services.id', '=', 'schedules.service_id')
        ->where('days_of_service','like', "%".Carbon::now()->locale('fr_FR')->dayName."%")
        ->where(\DB::raw("STR_TO_DATE(hour_of_starting,'%h:%i:%p')"),'<',Carbon::now()->toTimeString() )
        ->where(\DB::raw("STR_TO_DATE(hour_of_closing,'%H:%i:%p')"),'>',Carbon::now()->toTimeString() )
                
          
        ->where('title','like', '%'.trim($this->search).'%')->when($this->selectedCommune, function($query,$commune){
            return $query->where('commune_id',$commune);
        })->when($this->selectedPosition, function($query,$position){
            return $query->where('commune_id',Communes::select('id')->where('name',$position)->pluck('id'));
        })
        ->count()
        ,'total'=>Service::where('type_id',$this->typeId)->where('title','like', '%'.trim($this->search).'%')->when($this->selectedCommune, function($query,$commune){
            return $query->where('commune_id',$commune);
        })->when($this->selectedPosition, function($query,$position){
            return $query->where('commune_id',Communes::select('id')->where('name',$position)->pluck('id'));
        })
        
        ->when($this->website, function($query){
                return $query->whereNotNull('website');
        })->when($this->phone, function($query){
            return $query->whereNotNull('phone');
        })->when($this->rating, function($query){
            return $query->join('ratings', 'services.id', '=', 'ratings.service_id');
        })->when($this->ouvert, function($query){
            return $query->join('schedules', 'services.id', '=', 'schedules.service_id')->where(\DB::raw("STR_TO_DATE(hour_of_starting,'%h:%i:%p')"),'<',Carbon::now()->toTimeString() )
            ->where(\DB::raw("STR_TO_DATE(hour_of_closing,'%H:%i:%p')"),'>',Carbon::now()->toTimeString() );
        })->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
    
    }
    // return 404 problem
    }
       
    /**
     * 
     * like service
     */
        public function addLike($service_id){
            if(auth()->user()->hasVerifiedEmail() && Gate::allows('isClient')){
                $service=Service::find($service_id);
                if($service){
           auth()->user()->likes()->toggle($service_id);
           $user=Auth::user()->get();
          $likes=auth()->user()->likes->contains('id',$service_id);
           if($likes){
          // add created at and updated at
          $likedService=MyLikedService::where('user_id',Auth::user()->id)->where('service_id',$service_id)->first();
          //dd($likedService);
          $likedService->update(['created_at'=> Carbon::now(),
          'updated_at'=>Carbon::now()]);
          /**
         * notify the service provider
         * the Authentificated user  just added your service
           */
          
          $service_added=Service::find($service_id);
          $provider=$service_added->user()->get();
          //$user=Auth::user()->get();
          //$provider->notify(new ServiceAddingComplete($user,$service_added));
          Notification::send($provider, new ServicelikeComplete($service_added));
      
           }
           else{
           // with maria DB greater then 6 
           /*$notification = DB::table('notifications')
           ->where('data->user_id', $user)->where('data->service_id',$service_id)->where('data->title','Nouveau Favoris')
           ->get();*/
           // with maria db less then 6
           
           $notifications = DB::table('notifications')
           ->where('data' ,'like','%"user_id":"'.$user.'"%' )->where('data','like','%"service_id":"'.$service_id.'"%')->where('data','like','%"title":"Nouveau Favoris"%')
           ->get();
           //dd($notifications);
foreach($notifications as $notification){
    $notification->markAsRead();
}
           
           }
        }
        else{
            //something wrong
            $this->dispatchBrowserEvent('somethingwrong');
        }
            }
            //else maybe a flash message
        }      

        
/**
 * store service
 */
 public function store($service_id)
    {

      
        if(Auth::user()->hasVerifiedEmail() && Gate::allows('isClient')  && Gate::allows('isActive')){
            $service=Service::find($service_id);
            if($service){
        $exisitingService=MyService::where('user_id',Auth::user()->id)->where('service_id',$service_id)->first();
       if($exisitingService){
           //dispatch an already exist alert
        $this->dispatchBrowserEvent('swal:existed', [
            'position'=> 'top-end',
            'type'=> 'warning',
            'title'=> 'Vous avez deja ajouter cette service',
            'showConfirmButton'=> false,
            'timer'=> 3000,
            'confirmButtonClass'=> 'btn btn-primary',
            'buttonsStyling'=> false,
        ]);
       }
       else{
        MyService::create([
            'user_id' =>Auth::user()->id ,
            'service_id' => $service_id,
        ]);
        $this->isSetClicked = true;
   /*  dispatch an success alert*/
    $this->dispatchBrowserEvent('swal:success', [
        'position'=> 'top-end',
        'type'=> 'success',
        'title'=> 'Ajout terminer avec success',
        'showConfirmButton'=> false,
        'timer'=> 3000,
        'confirmButtonClass'=> 'btn btn-primary',
        'buttonsStyling'=> false,
    ]);
/**
 * notify the service provider
 * the Authentificated user  just added
 * your service
 */
    $service_added=Service::find($service_id);
    $provider=$service_added->user()->get();
    //$user=Auth::user()->get();
    //$provider->notify(new ServiceAddingComplete($user,$service_added));
    Notification::send($provider, new ServiceAddingComplete($service_added));

   
    }
}
else{
    //something wrong
    $this->dispatchBrowserEvent('somethingwrong');
}   
}}
}
