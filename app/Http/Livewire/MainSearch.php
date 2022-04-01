<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Type;
use App\Models\services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;

class MainSearch extends Component
{

    public $typeId;
    public $available=true;
  
    public $query;
    public  $services;



    /**
     * mount the current values of the proprieties
     */
    public function mount()
    {
        $this->query='';
        $this->services=[];
        
    }

/**
 * reset
 */
public function resett()
{
    $this->query='';
    $this->services=[];
}

    /**
     * life cycle hook
     */

     public function updatedQuery()
     {
         
        $this->services=Service::with('type')->select('services.*')->distinct()->where('title','like', trim($this->query).'%')->orWhere('title','like', '%'.trim($this->query))
        ->when($this->available, function($query2){
        return $query2->join('schedules', 'services.id', '=', 'schedules.service_id')
        ->where(\DB::raw("STR_TO_DATE(hour_of_starting,'%h:%i:%p')"),'<',Carbon::now()->toTimeString() )
        ->where(\DB::raw("STR_TO_DATE(hour_of_closing,'%H:%i:%p')"),'>',Carbon::now()->toTimeString() );
        })->when($this->typeId, function($query,$id){
            return $query->where('type_id',$id);
        })
        
        ->get()->toArray();
      //  dd($this->services);
     
     
    }

    public function render()
    {
       $types=Type::select('id','name')->get();
        return view('livewire.main-search',['types'=>$types]);
    }



    /**
     * show filter Modal
     */
    public function showFilters()
    {
        //show the modal
        $this->dispatchBrowserEvent('showModal');
    }

    /**
     * redirect to service
     */
    public function redirectToService($id){

        $service=Service::findOrFail($id);
if($service){
    if(Auth::user() and Gate::allows('isClient')){
            $type=$service->type->name;

    return redirect('client/'.$type.'/agency-details/'.$id);
}
    else{
        $type=$service->type->name;

    return redirect($type.'/agency-details/'.$id);
}
    }
    }
}
    

    /**
     * filter 
     * proprieties
     */
    


