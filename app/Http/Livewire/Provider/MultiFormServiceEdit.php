<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\services\Service;
use App\Models\services\Schedule;
use App\Models\services\SocialMediaAccount;
use App\Models\Wilaya;
use App\Models\Communes;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MultiFormServiceEdit extends Component
{
    use WithFileUploads;
    public $TypeId;
    public $state=[];
    public $OldImage;
   public $ServiceId;
    public $ServiceImage;
    public $ServiceTitle;
    //public $ServiceWilaya;
    //public $ServiceCommune;
    public $ServiceAddress;
    public $ServicePhone;
    public $ServiceBody;
    public $ServiceHome;
    public $ServiceTags;
    public $ServicePosition;
    public $ServiceWebsite;
    public $ServiceGmail;

    public $ServiceFacebook;
    public $ServiceLinkedIn;
    public $ServiceInstagram;
    public $ServiceDays=[];
    public $hourOfStart;
    public $hourOfEnd;
    public $ServiceShipping;
    public $VehiculeShape;
    public $ServiceTerritory;
    public $TotalForms=5;
    public $CurrentForm=1;
    public $TermsAgreement=null;
public $wilayas;
public $communes;
public $selectedWilaya=NULL;
public $selectedCommune=NULL;
public $sell_point_type_id=96;


public function mount($service_id)
    {
        $this->ServiceId = $service_id;
      $service=Service::with('schedule','socialMediaAccounts')->findOrFail($this->ServiceId);
      $this->state=$service->toArray();
      $socialMediaAccounts=SocialMediaAccount::where('service_id',$this->ServiceId)->first();
      $this->TypeId=$service->type_id;
      $this->ServiceId=$service->id;
    $this->OldImage=$service->service_image;
    $this->ServiceImage=$service->service_image;
    $this->ServiceTitle=$service->title;
    $this->ServiceAddress=$service->address;
    $this->ServicePhone=$service->phone;
    $this->ServiceBody=$service->body;
    
    $this->ServiceTags=$service->tags;
    $this->ServicePosition=$service->latitude.', '.$service->longitude;
    $this->ServiceWebsite=$service->website;
    if($socialMediaAccounts){
        $this->ServiceGmail=$service->socialMediaAccounts->gmail;
        $this->ServiceFacebook=$service->socialMediaAccounts->facebook;
        $this->ServiceLinkedIn=$service->socialMediaAccounts->linkedin;
        $this->ServiceInstagram=$service->socialMediaAccounts->instagram;  
    }
   
    $this->ServiceDays=$service->schedule->days_of_service;
    
    $this->ServiceShipping=$service->shipping;
    $this->VehiculeShape;
    $this->ServiceTerritory;
        $this->CurrentForm = 1;
        $this->wilayas=Wilaya::all();
        
        $this->communes=collect();

    }
    public function updatedSelectedWilaya($wilaya){
        if(!is_null($wilaya)){
        $this->communes=Communes::where('wilaya_id',$wilaya)->get();}
    }
   
    public function render()
    {
        return view('livewire.provider.multi-form-service-edit');
    }
    /**
     * decrease the form step
     */
    public function decreaseFormValue(){
        $this->resetErrorBag();
        $this->CurrentForm--;
        if( $this->CurrentForm < 1){
            $this->CurrentForm ==  1;
        }
        
    }
    /**
     * increase the form step
     */
    public function increaseFormValue(){
        $this->resetErrorBag();
        $this->validateData();
        $this->CurrentForm++;
        if( $this->CurrentForm >5){
            $this->CurrentForm ==  5;
        } 
        
    }
    public function validateData(){
        //validation of the first form
        if($this->CurrentForm==1){
            $this->validate([
                'ServiceTitle'=>'required|string|min:15',
                'ServiceAddress'=>'required|string|min:50',
                'ServicePhone'=>['required', 'regex:/^(((07)|(05)|(06))[0-9]{8})|((02)[0-9]{7})/','min:9','max:10'],
                'selectedCommune'=>'required|string',
            ]);

        }
        //validation of the second form
        elseif($this->CurrentForm==2){
            $this->validate([
                'ServiceBody'=>'required|string|min:220',
                'ServiceTags'=>'required|string|min:50',
                'ServicePosition'=>'required|string|min:30|max:40',
                'ServiceWebsite'=>'string|nullable',
            ]);
        }
        //validation of the third form
        elseif($this->CurrentForm==3){
            $this->validate([
                'ServiceHome'=>'string|nullable',
                'ServiceGmail'=>'string|required',
                'ServiceFacebook'=>'string|nullable',
                'ServiceLinkedIn'=>'string|nullable',
                'ServiceInstagram'=>'string|nullable',
            ]);
        }
       // validation of the fourth form
        elseif($this->CurrentForm==4){
            $this->validate([
                'ServiceDays'=>'required|array|min:3',
                'hourOfStart'=>'required|string',
                'hourOfEnd'=>'required|string',
                ]);
        }
        
    }
    public function editService(){
        if(Auth::user()){
            if(Gate::allows('isProvider') and Gate::allows('isGoing')){
        $this->resetErrorBag();
        //validation of the final form
       
        if($this->CurrentForm==5){
        $this->validate([
            'ServiceShipping'=>'boolean|nullable',
            'VehiculeShape'=>'string|nullable',
            'ServiceTerritory'=>'string|nullable',
            'TermsAgreement'=>'required|string',
        ]);
        if($this->TermsAgreement==true){

if($this->ServiceImage){
    if($this->ServiceImage == $this->OldImage){
    $image=$this->ServiceImage;}
    else{
        $this->validate([
            'ServiceImage'=>'image|nullable|mimes:jpeg,png,jpg|max:2048',
            ]);
        $image=$this->ServiceImage->store('/','services/service-image');
        Storage::disk('services/service-image')->delete($this->OldImage);  
    }
}
else{
    $image=null;
}
$arr = explode(",", $this->ServicePosition, 2);
$latitude = $arr[0];
$longitude = trim($arr[1]);
//dd($longitude);
$user_id=Auth::user()->id;
//store data in servie table
            $storedServiceData=array(
                
                'commune_id'=>$this->selectedCommune,
                'service_image'=>$image,
                'title'=>$this->ServiceTitle,                     
                'address'=>$this->ServiceAddress,
                'phone'=>$this->ServicePhone,
                'website'=>$this->ServiceWebsite,
                'latitude'=>$latitude,
                'longitude'=>$longitude,
                'body'=>$this->ServiceBody,
                'tags'=>$this->ServiceTags,
                'shipping'=>$this->ServiceShipping,
                'home'=>$this->ServiceHome,
                'vehicule_shape'=>$this->VehiculeShape,
                'covering_territory'=>$this->ServiceTerritory,
                
                
            );
             //get the service to be updated
        $editedService=Service::findOrFail($this->ServiceId);
        //update the service
        $editedService->update($storedServiceData);
            
            $service_schedule = Schedule::where('service_id',$this->ServiceId)->first();
            $storedScheduleData=array(
                'days_of_service'=>$this->ServiceDays,
                'hour_of_starting'=>$this->hourOfStart,
                'hour_of_closing'=>$this->hourOfEnd,
            );
            //update data in schedule table
            $service_schedule->update($storedScheduleData);
            //find the social media accounts relatred to this service
            $service_social_media_accounts=SocialMediaAccount::where('service_id',$this->ServiceId)->first();
            //check if exist 
            if($service_social_media_accounts){
            // if they exists and one of them is not null
            if($this->ServiceGmail != null || $this->ServiceFacebook != null || $this->ServiceLinkedIn != null || $this->ServiceInstagram){
            $storedSocialMediaData=array(
                'gmail'=>$this->ServiceGmail,
                'facebook'=>$this->ServiceFacebook,
                'linkedin'=>$this->ServiceLinkedIn,
                'instagram'=>$this->ServiceInstagram,
            );
        //update the social media table
        $service_social_media_accounts->update($storedSocialMediaData);
        }
        // the user decide to remove his accounts
            else{
                //remove the account
$service_social_media_accounts->delete();
            }
        }
        // the service does not have an account
        else{
            //if the user decide to add a service social media accounts
            if($this->ServiceGmail || $this->ServiceFacebook != null || $this->ServiceLinkedIn != null || $this->ServiceInstagram){
                $storedSocialMediaData=array(
                    'service_id'=>$this->ServiceId,
                    'gmail'=>$this->ServiceGmail,
                    'facebook'=>$this->ServiceFacebook,
                    'linkedin'=>$this->ServiceLinkedIn,
                    'instagram'=>$this->ServiceInstagram,
                );
             //store data in social media table
            SocialMediaAccount::create($storedSocialMediaData)
            ;}
            }
        }
           
        
    
            //send success alert
            $this->dispatchBrowserEvent('swal:success', [
                'position'=> 'top-end',
                'type'=> 'success',
                'title'=> 'Modification terminer avec success',
                'showConfirmButton'=> false,
                'timer'=> 3000,
                'confirmButtonClass'=> 'btn btn-primary',
                'buttonsStyling'=> false,
            ]);
    
    return redirect('provider/services-list');
}}
else{
    return redirect('login');
  }
}else{
      return redirect('login');
  }
    }
    }
