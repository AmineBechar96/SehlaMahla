<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\services\Service;
use App\Models\Provider\Client;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
class Clients extends Component
{
use WithPagination;
protected $paginationTheme = 'bootstrap';
public $state=[];
public $search ;
public $editMode=false;
public $client_service;
public $client_name;
public $client_phone;
public $client_address;
public $client_email;
public $deleted_client_id;
public $deleted_client_name;




public function mount()
    {
     
     $this->services=Service::where('user_id',auth()->user()->id)->get();
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
        $clients=Client::where(function($sub_query) {
            $sub_query->where('name','like', '%'.trim($this->search).'%');})
            ->whereIn('service_id',$this->services->pluck('id')->toArray())->latest();
            $clientss=Client::
            whereIn('service_id',$this->services->pluck('id')->toArray())->get();
        return view('livewire.provider.clients',[
            'clients'=>$clients->paginate(4),
            'total'=>$clients->count(),
            'clien'=>$clientss,
        ]);
    }


/**
 * show edit modal and load the data
 */
public function editClient($id)
{
// find the client
$client=Client::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
if($client){
//show modal
$this->dispatchBrowserEvent('showModal');
//edit mode
$this->editMode=true;
//set the data
$this->state=$client->toArray();
$this->client_service=$client->service_id;
$this->client_name=$client->name;
$this->client_phone=$client->phone;
$this->client_email=$client->email;
$this->client_address=$client->address;
}
else{
    $this->dispatchBrowserEvent('somethingwrong');

} 
}
/**
 * show modal and set edit mode to false
 */
public function addNew()
{
$this->resetErrorBag();
$this->reset(['client_service','client_name','client_phone','client_address','client_email']);
//show modal
$this->dispatchBrowserEvent('showModal');
//edit mode
$this->editMode=false;
}


/**
 * add new client
 */
public function addClient()
    {
    //validate the data
    $this->validate([
            'client_service'=>'required|exists:services,id',
            'client_address'=>'string|required|min:20|max:40',
            'client_name'=>'required|string',
            'client_phone'=>['required', 'regex:/^(((07)|(05)|(06))[0-9]{8})|((02)[0-9]{7})/','min:9','max:10'],
            'client_email'=>'email:rfc,dns|nullable',
        ]);
       
        if(in_array($this->client_service,$this->services->pluck('id')->toArray())){          

        //store data in servie table
        $storedServiceData=array(
            'service_id'=>$this->client_service,
            'name'=>$this->client_name,
            'phone'=>$this->client_phone,
            'email'=>$this->client_email,
            'address'=>$this->client_address,                    
              
        );
        //store
       Client::create($storedServiceData);
        $this->render();

        //send success alert
        $this->dispatchBrowserEvent('swal:success');

        //close the modal
        $this->dispatchBrowserEvent('closeModal');}
        else{
            $this->dispatchBrowserEvent('somethingwrong');

        }
    }

/**
 * update the client
 */

public function updateClient()
    {
        //validate the data
        $this->validate([
            'client_service'=>'required|exists:services,id',
            'client_address'=>'string|required|min:20|max:40',
            'client_name'=>'required|string',
            'client_phone'=>['required', 'regex:/^(((07)|(05)|(06))[0-9]{8})|((02)[0-9]{7})/','min:9','max:10'],
            'client_email'=>'email:rfc,dns|nullable',
        ]);
        
        
        //store data in servie table
        $updatedData=array(
          //  'service_id'=>$this->client_service,
            'name'=>$this->client_name,
            'phone'=>$this->client_phone,
            'email'=>$this->client_email,
            'address'=>$this->client_address,                    
              
        );
        
         //get the client to be updated
        $editedClient=Client::findOrFail($this->state['id']);

        //update the client
        $editedClient->update($updatedData);
        
         //send success alert
         $this->dispatchBrowserEvent('swal:update');
         //close the modal
        $this->dispatchBrowserEvent('closeModal');
    }

    /**
     * confirm delete
     * and get the id of the product to be deleted
     */
   
public function confirmDelete($id)
    {
        $this->deleted_client_id=$id;
      ///  $client=Client::findOrFail($id);
        //find the client
        $client=Client::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
        if($client){
        $this->deleted_client_name=$client->name;
        $this->dispatchBrowserEvent('showConfirmModal');
        }
        else{
            $this->dispatchBrowserEvent('somethingwrong');
 
        }  
     }

         /**
          * delete the client
         */
public function deleteClient()
        {
            $client=Client::findOrFail($this->deleted_client_id);
try{
    $client->delete(); 
    //close confrim modal
            $this->dispatchBrowserEvent('CloseConfirmModal');   
}
       catch(\Throwable $th){
        $this->dispatchBrowserEvent('CloseConfirmModal');   

        $this->dispatchBrowserEvent('somethingwrong');
       }     
              
           

        }

}
