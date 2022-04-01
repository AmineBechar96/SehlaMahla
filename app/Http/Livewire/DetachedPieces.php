<?php

namespace App\Http\Livewire;
use App\Models\detachedPieceStore;
use App\Models\Wilaya;
use App\Models\Communes;
use App\Models\MyService;
use App\Models\MyLikedService;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class DetachedPieces extends Component
{
    
        use WithPagination;
        public $website=false;
        public $rating=false;
        public $phone=false;
    
        public $wilaya_id=0;
        
        public $search ;
        public $selectedPosition;
       // public $selectedPositionCommuneName=null;
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
       
    
        public function  mount(){
            $this->wilayas=Wilaya::all();
            
            $this->communes=collect();
           // $this->$selectedPositionCommuneName=Communes::select('id')->where('name',$this->selectedPosition)->first();
         //   $this->addresses =Communes::with('wilaya')->where('name','like', '%'.trim($this->searchPosition).'%')
          //  ->limit(6)->get();
    
            
        }
        public function updatedSelectedWilaya($wilaya){
            if(!is_null($wilaya)){
            $this->communes=Communes::where('wilaya_id',$wilaya)->get();}
        }
       
       /* public function getCommune($code){
    
            $communes=\DB::table('wila_com')->where('wilaya_id',$code)->pluck('name','id');
            return json_encode($communes);
              }*/
        public function clearFilters()
        {
            /*$this->$website=false;
            $this->$rating=false;
            $this->phone=false;
            $this->$ouvert=false;*/
            return redirect()->to('rent-agencies');
           // $this->re-render();
           //return $this->mount();
        }
        public function hydrate()
        {
            $this->emit('select2');
           
     
        }
    
        
        public function render()
        {
            //wire:click="likeService({{$agency->ID}},'{{$agency->type}}')"
        if($this->agencyLikedId!=null and $this->agencyLikedType!=null )  {
            if(Auth::user()->hasVerifiedEmail()){
                //$user_id=Auth::user()->id;
                $AlreadyLikedService=MyLikedService::where('user_id',Auth::user()->id)->where('agency_id',$this->agencyLikedId)->where('agency_type',$this->agencyLikedType)->where('liked',$this->liked)->first();
               if($AlreadyLikedService){
           
               }
               else{
                   $AlreadyLikedService2=MyLikedService::where('user_id',Auth::user()->id)->where('agency_id',$this->agencyLikedId)->where('agency_type',$this->agencyLikedType)->where('liked','!=',$this->liked)->first();
                   if($AlreadyLikedService2){
                       //$AlreadyLikedService2->liked=$this->liked;
                       $AlreadyLikedService2->delete();
                   }
               else{ 
                if($this->liked==false){

                }
             else{
                MyLikedService::create([
                    'user_id' =>Auth::user()->id ,
                    'agency_id' => $this->agencyLikedId,
                    'agency_type' => $this->agencyLikedType,
                    'liked'=>$this->liked,
                    'token' => $this->agencyLikedId."_of_".$this->agencyLikedType
                ]);
               }}
               // dd($this->liked);
                //$this->isSetClicked = true;
           /*     $this->dispatchBrowserEvent('swal', ['title' => 'Feedback Saved']);*/
            
           
            }}
            
        }
             $order;
             if($this->filter=="distance" or $this->filter=="title"){
                 $order="asc";
             }
             else{
                $order="desc";
             }
            if($this->selectedCommune==null && empty($this->selectedPosition)){
            if($this->website==false && $this->rating==false && $this->phone==false){
           
            return view('livewire.detached-pieces', [
                'agencies' => detachedPieceStore::where(function($sub_query) {
                    $sub_query->where('title','like', '%'.trim($this->search).'%');
                })->orderBy($this->filter,$order)->paginate(6)
            ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
            ->whereNotNull('rating')->groupBy('rate')
            ->orderBy('count','desc')
            ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count()
            ,'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
        
            
            }
            else if ($this->website!=false && $this->rating==false && $this->phone==false ){
                return view('livewire.detached-pieces', [
                    'agencies' => detachedPieceStore::where(function($sub_query) {
                        $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website');
                    })->orderBy($this->filter,$order)->paginate(6)
                ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                ->whereNotNull('rating')->groupBy('rate')
                ->orderBy('count','desc')
                ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                } else if ($this->website==false && $this->rating!=false && $this->phone==false ){
                    return view('livewire.detached-pieces', [
                        'agencies' => detachedPieceStore::where(function($sub_query) {
                            $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating');
                        })->orderBy($this->filter,$order)->paginate(6)
                    ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                    ->whereNotNull('rating')->groupBy('rate')
                    ->orderBy('count','desc')
                    ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                    }
                    else if ($this->website==false && $this->rating==false && $this->phone!=false){
                        return view('livewire.detached-pieces', [
                            'agencies' => detachedPieceStore::where(function($sub_query) {
                                $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone');
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                        }
                     
                        else if ($this->website!=false && $this->rating!=false && $this->phone==false){
                            return view('livewire.detached-pieces', [
                                'agencies' => detachedPieceStore::where(function($sub_query) {
                                    $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating');
                                })->orderBy($this->filter,$order)->paginate(6)
                            ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                            ->whereNotNull('rating')->groupBy('rate')
                            ->orderBy('count','desc')
                            ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                            }
                            else if ($this->website!=false && $this->rating==false && $this->phone!=false){
                                return view('livewire.detached-pieces', [
                                    'agencies' => detachedPieceStore::where(function($sub_query) {
                                        $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone');
                                    })->orderBy($this->filter,$order)->paginate(6)
                                ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                ->whereNotNull('rating')->groupBy('rate')
                                ->orderBy('count','desc')
                                ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                }
                               
                                else if ($this->website==false && $this->rating!=false && $this->phone!=false ){
                                    return view('livewire.detached-pieces', [
                                        'agencies' => detachedPieceStore::where(function($sub_query) {
                                            $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone');
                                        })->orderBy($this->filter,$order)->paginate(6)
                                    ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                    ->whereNotNull('rating')->groupBy('rate')
                                    ->orderBy('count','desc')
                                    ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                    }
                                  
                                        
                                            else if ($this->website!=false && $this->rating!=false && $this->phone!=false){
                                                return view('livewire.detached-pieces', [
                                                    'agencies' => detachedPieceStore::where(function($sub_query) {
                                                        $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone');
                                                    })->orderBy($this->filter,$order)->paginate(6)
                                                ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                ->whereNotNull('rating')->groupBy('rate')
                                                ->orderBy('count','desc')
                                                ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                                }
                                                
                                                    
                                                        
                else{
                    return view('livewire.detached-pieces', [
                        'agencies' => detachedPieceStore::where(function($sub_query) {
                            $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                        })->orderBy($this->filter,$order)->paginate(6)
                    ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                    ->whereNotNull('rating')->groupBy('rate')
                    ->orderBy('count','desc')
                    ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('title','like', '%'.trim($this->search).'%')
            ->count(),'total'=>detachedPieceStore::where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                    } 
        
            }        
        
        
        else{
            if($this->selectedCommune!=null){
                if($this->website==false && $this->rating==false && $this->phone==false){
                
                    return view('livewire.detached-pieces', [
                        'agencies' => detachedPieceStore::with('commune')->where(function($sub_query) {
                            $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->orderBy($this->filter,'asc');
                        })->orderBy($this->filter,$order)->paginate(6)
                    ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                    ->whereNotNull('rating')->groupBy('rate')
                    ->orderBy('count','desc')
                    ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    
                    ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()
                   ]);
                
                    
                    }
                    else if ($this->website!=false && $this->rating==false && $this->phone==false ){
                        return view('livewire.detached-pieces', [
                            'agencies' => detachedPieceStore::where(function($sub_query) {
                                $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website');
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->cocount(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()]);
                        } else if ($this->website==false && $this->rating!=false && $this->phone==false){
                            return view('livewire.detached-pieces', [
                                'agencies' => detachedPieceStore::where(function($sub_query) {
                                    $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating');
                                })->orderBy($this->filter,$order)->paginate(6)
                            ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                            ->whereNotNull('rating')->groupBy('rate')
                            ->orderBy('count','desc')
                            ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()]);
                            }
                            else if ($this->website==false && $this->rating==false && $this->phone!=false){
                                return view('livewire.detached-pieces', [
                                    'agencies' => detachedPieceStore::where(function($sub_query) {
                                        $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone');
                                    })->orderBy($this->filter,$order)->paginate(6)
                                ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                ->whereNotNull('rating')->groupBy('rate')
                                ->orderBy('count','desc')
                                ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),
                    'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()]);
                                }
                             
                                else if ($this->website!=false && $this->rating!=false && $this->phone==false){
                                    return view('livewire.detached-pieces', [
                                        'agencies' => detachedPieceStore::where(function($sub_query) {
                                            $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating');
                                        })->orderBy($this->filter,$order)->paginate(6)
                                    ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                    ->whereNotNull('rating')->groupBy('rate')
                                    ->orderBy('count','desc')
                                    ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()]);
                                    }
                                    else if ($this->website!=false && $this->rating==false && $this->phone!=false){
                                        return view('livewire.detached-pieces', [
                                            'agencies' => detachedPieceStore::where(function($sub_query) {
                                                $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone');
                                            })->orderBy($this->filter,$order)->paginate(6)
                                        ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                        ->whereNotNull('rating')->groupBy('rate')
                                        ->orderBy('count','desc')
                                        ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()]);
                                        }
                                       
                                        else if ($this->website==false && $this->rating!=false && $this->phone!=false){
                                            return view('livewire.detached-pieces', [
                                                'agencies' => detachedPieceStore::where(function($sub_query) {
                                                    $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone');
                                                })->orderBy($this->filter,$order)->paginate(6)
                                            ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                            ->whereNotNull('rating')->groupBy('rate')
                                            ->orderBy('count','desc')
                                            ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()]);
                                            }
                                           
                                                
                                                    else if ($this->website!=false && $this->rating!=false && $this->phone!=false){
                                                        return view('livewire.detached-pieces', [
                                                            'agencies' => detachedPieceStore::where(function($sub_query) {
                                                                $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone');
                                                            })->orderBy($this->filter,$order)->paginate(6)
                                                        ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                        ->whereNotNull('rating')->groupBy('rate')
                                                        ->orderBy('count','desc')
                                                        ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()]);
                                                        }
                                                        
                                                            
                                                               
                        else{
                            return view('livewire.detached-pieces', [
                                'agencies' => detachedPieceStore::where(function($sub_query) {
                                    $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                })->orderBy($this->filter,$order)->paginate(6)
                            ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                            ->whereNotNull('rating')->groupBy('rate')
                            ->orderBy('count','desc')
                            ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')
                    ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                    ->limit(1)->get()]);
                            } 
                
                    
            
            
            }
           else{
            if($this->website==false && $this->rating==false && $this->phone==false){
                
                return view('livewire.detached-pieces', [
                    'agencies' => detachedPieceStore::with('commune')->where(function($sub_query) {
                        $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->orderBy($this->filter,'asc');
                    })->orderBy($this->filter,$order)->paginate(6)
                ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                ->whereNotNull('rating')->groupBy('rate')
                ->orderBy('count','desc')
                ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()
               ]);
            
                
                }
                else if ($this->website!=false && $this->rating==false && $this->phone==false){
                    return view('livewire.detached-pieces', [
                        'agencies' => detachedPieceStore::where(function($sub_query) {
                            $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website');
                        })->orderBy($this->filter,$order)->paginate(6)
                    ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                    ->whereNotNull('rating')->groupBy('rate')
                    ->orderBy('count','desc')
                    ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                    } else if ($this->website==false && $this->rating!=false && $this->phone==false){
                        return view('livewire.detached-pieces', [
                            'agencies' => detachedPieceStore::where(function($sub_query) {
                                $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating');
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                        }
                        else if ($this->website==false && $this->rating==false && $this->phone!=false ){
                            return view('livewire.detached-pieces', [
                                'agencies' => detachedPieceStore::where(function($sub_query) {
                                    $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone');
                                })->orderBy($this->filter,$order)->paginate(6)
                            ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                            ->whereNotNull('rating')->groupBy('rate')
                            ->orderBy('count','desc')
                            ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                            }
                           
                            else if ($this->website!=false && $this->rating!=false && $this->phone==false){
                                return view('livewire.detached-pieces', [
                                    'agencies' => detachedPieceStore::where(function($sub_query) {
                                        $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating');
                                    })->orderBy($this->filter,$order)->paginate(6)
                                ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                ->whereNotNull('rating')->groupBy('rate')
                                ->orderBy('count','desc')
                                ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                }
                                else if ($this->website!=false && $this->rating==false && $this->phone!=false){
                                    return view('livewire.detached-pieces', [
                                        'agencies' => detachedPieceStore::where(function($sub_query) {
                                            $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone');
                                        })->orderBy($this->filter,$order)->paginate(6)
                                    ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                    ->whereNotNull('rating')->groupBy('rate')
                                    ->orderBy('count','desc')
                                    ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                    }
                                    
                                    else if ($this->website==false && $this->rating!=false && $this->phone!=false && $this->ouvert==false){
                                        return view('livewire.detached-pieces', [
                                            'agencies' => detachedPieceStore::where(function($sub_query) {
                                                $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone');
                                            })->orderBy($this->filter,$order)->paginate(6)
                                        ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                        ->whereNotNull('rating')->groupBy('rate')
                                        ->orderBy('count','desc')
                                        ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                        }
                                        
                                            
                                                else if ($this->website!=false && $this->rating!=false && $this->phone!=false){
                                                    return view('livewire.detached-pieces', [
                                                        'agencies' => detachedPieceStore::where(function($sub_query) {
                                                            $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone');
                                                        })->orderBy($this->filter,$order)->paginate(6)
                                                    ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                    ->whereNotNull('rating')->groupBy('rate')
                                                    ->orderBy('count','desc')
                                                    ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                                    }
                                                    
                                                        
                                                            
                    else{
                        return view('livewire.detached-pieces', [
                            'agencies' => detachedPieceStore::where(function($sub_query) {
                                $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>detachedPieceStore::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>detachedPieceStore::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withrating'=>detachedPieceStore::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'withphone'=>detachedPieceStore::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')
                ->count(),'total'=>detachedPieceStore::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                        } 
            
                
        
        
           }
           
                    }}
                    public function store($agency_id,$agency_type)
                    {
                        if(Auth::user()->hasVerifiedEmail()){
                        //$user_id=Auth::user()->id;
                        $exisitingService=MyService::where('user_id',Auth::user()->id)->where('agency_id',$agency_id)->where('agency_type',$agency_type)->first();
                       if($exisitingService){
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
                            'agency_id' => $agency_id,
                            'agency_type' => $agency_type,
                            'token' => $agency_id."_of_".$agency_type
                        ]);
                        $this->isSetClicked = true;
                   /*     $this->dispatchBrowserEvent('swal', ['title' => 'Feedback Saved']);*/
                    $this->dispatchBrowserEvent('swal:success', [
                        'position'=> 'top-end',
                        'type'=> 'success',
                        'title'=> 'Ajout terminer avec success',
                        'showConfirmButton'=> false,
                        'timer'=> 3000,
                        'confirmButtonClass'=> 'btn btn-primary',
                        'buttonsStyling'=> false,
                    ]);
                   
                    }
                    
                }}
}
 