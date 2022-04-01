<?php

namespace App\Http\Livewire\Provider;

use App\Models\services\MyService;
use App\Models\services\MyLikedService;
use App\Models\User;
use App\Models\services\Service;
use App\Models\Provider\Client;

use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class UsersList extends Component
{
    public $ammount=10;
    public $ammountt=10;
    public $client_id;
    public $client_name;
    public $client_phone;
    public $client_email; 
    public $client_address;
    public $subs="subscriber";
    public $likerr="liker";
    public function render()
    {
        if(Auth::user()->hasVerifiedEmail() and Gate::allows('isProvider') and Gate::allows('isGoing')){
            $users=MyService::select('users.*','services.id as serviceID' ,'services.title','users.id as userID','my_services.user_id as SaverID')
            ->join('users','users.id','=','my_services.user_id')->join('services','my_services.service_id','=','services.id')
            ->where('services.user_id',Auth::user()->id)
            ->take($this->ammount)
            ->get();
            $likers=MyLikedService::select('users.*','services.id as serviceID' ,'services.title','users.id as userID','service_user.user_id as likerID')
            ->join('users','users.id','=','service_user.user_id')->join('services','service_user.service_id','=','services.id')
            ->where('services.user_id',Auth::user()->id)
            ->take($this->ammountt)
            ->get();
             //dd($users);
            $notifications=auth()->user()->unreadNotifications->where('type','App\Notifications\ServicelikeComplete');
            if($notifications){
            $notifications->markAsRead();
            }
            $notifications2=auth()->user()->unreadNotifications->where('type','App\Notifications\ServiceAddingComplete');
            if($notifications2){
            $notifications2->markAsRead();
            }}
        return view('livewire.provider.users-list',['users'=>$users,'likers'=>$likers]);
    }

    //load more for users
    public function loadUsers()
    {
        $this->ammount +=10;
    }
    //load more for users
    public function loadLikers()
    {
        $this->ammountt +=10;
    }
    //add client show modal
    public function addClient($service_id,$user_id,$flag)
    {
if($flag=="subscriber"){
    $service=MyService::select('my_services.*')->where('service_id',$service_id)->where('user_id',$user_id)->first();
      
    if($service){
        $this->client_id=$service->user_id;
        $this->client_name=$service->user->name;
        $this->service_id=$service->service_id;
        $this->dispatchBrowserEvent('addclient');
    }
  
}
else{
    $service=MyLikedService::where('service_id',$service_id)->where('user_id',$user_id)->first();
    if($service){
        $this->client_id=$service->user_id;

        $this->client_name=$service->user->name;

        $this->service_id=$service->service_id;
        $this->dispatchBrowserEvent('addclient');
    }

}
        
       
        
    }

    public function saveClient()
{
    $client=Client::where('user_id',$this->client_id)->where('service_id',$this->service_id)->first();
  
    if($client){
 $this->dispatchBrowserEvent('alreadyclient');
    }
    else{
$this->validate([
    'client_address'=>'string|required|min:20|max:40',
    'client_phone'=>['required', 'regex:/^(((07)|(05)|(06))[0-9]{8})|((02)[0-9]{7})/','min:9','max:10'],
    'client_email'=>'email:rfc,dns|nullable',
]);


//store data in client table
$storedServiceData=array(
    'service_id'=>$this->service_id,
    'user_id'=>$this->client_id,
    'name'=>$this->client_name,
    'phone'=>$this->client_phone,
    'email'=>$this->client_email,
    'address'=>$this->client_address,                       
);
//store
Client::create($storedServiceData);
$this->render();

//send success alert
$this->dispatchBrowserEvent('addclientsuccess');

//close the modal
$this->dispatchBrowserEvent('closeaddclient');
    }
}
}
   