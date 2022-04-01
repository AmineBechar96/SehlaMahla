<?php

namespace App\Http\Livewire;
use App\Models\RentAgency;
use App\Models\Wilaya;
use App\Models\Communes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class GeneralMeca extends Component
{
    use WithPagination;
    public $website=false;
    public $rating=false;
    public $phone=false;
    public $ouvert=false;
    public $wilaya_id=0;
    
    public $search ;
    public $selectedPosition;
   // public $selectedPositionCommuneName=null;
    public $searchPosition ;
    public $filter="title" ;
   
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
         $order;
         if($this->filter=="distance" or $this->filter=="title"){
             $order="asc";
         }
         else{
            $order="desc";
         }
        if($this->selectedCommune==null && empty($this->selectedPosition)){
        if($this->website==false && $this->rating==false && $this->phone==false && $this->ouvert==false){
       
        return view('livewire.general-mechanic', [
            'agencies' => RentAgency::where(function($sub_query) {
                $sub_query->where('title','like', '%'.trim($this->search).'%');
            })->orderBy($this->filter,$order)->paginate(6)
        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
        ->whereNotNull('rating')->groupBy('rate')
        ->orderBy('count','desc')
        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::count()
        ,'total'=>RentAgency::count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
    
        
        }
        else if ($this->website!=false && $this->rating==false && $this->phone==false && $this->ouvert==false){
            return view('livewire.general-mechanic', [
                'agencies' => RentAgency::where(function($sub_query) {
                    $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website');
                })->orderBy($this->filter,$order)->paginate(6)
            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
            ->whereNotNull('rating')->groupBy('rate')
            ->orderBy('count','desc')
            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
            } else if ($this->website==false && $this->rating!=false && $this->phone==false && $this->ouvert==false){
                return view('livewire.general-mechanic', [
                    'agencies' => RentAgency::where(function($sub_query) {
                        $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating');
                    })->orderBy($this->filter,$order)->paginate(6)
                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                ->whereNotNull('rating')->groupBy('rate')
                ->orderBy('count','desc')
                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                }
                else if ($this->website==false && $this->rating==false && $this->phone!=false && $this->ouvert==false){
                    return view('livewire.general-mechanic', [
                        'agencies' => RentAgency::where(function($sub_query) {
                            $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone');
                        })->orderBy($this->filter,$order)->paginate(6)
                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                    ->whereNotNull('rating')->groupBy('rate')
                    ->orderBy('count','desc')
                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                    }
                    else if ($this->website==false && $this->rating==false && $this->phone==false && $this->ouvert!=false){
                        return view('livewire.general-mechanic', [
                            'agencies' => RentAgency::where(function($sub_query) {
                                $sub_query->where('title','like', '%'.trim($this->search).'%')->where('open_state',$this->ouvert);
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::where('title','like', '%'.trim($this->search).'%')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                        }
                    else if ($this->website!=false && $this->rating!=false && $this->phone==false && $this->ouvert==false){
                        return view('livewire.general-mechanic', [
                            'agencies' => RentAgency::where(function($sub_query) {
                                $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating');
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('website')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                        }
                        else if ($this->website!=false && $this->rating==false && $this->phone!=false && $this->ouvert==false){
                            return view('livewire.general-mechanic', [
                                'agencies' => RentAgency::where(function($sub_query) {
                                    $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone');
                                })->orderBy($this->filter,$order)->paginate(6)
                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                            ->whereNotNull('rating')->groupBy('rate')
                            ->orderBy('count','desc')
                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('website')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                            }
                            else if ($this->website!=false && $this->rating==false && $this->phone==false && $this->ouvert!=false){
                                return view('livewire.general-mechanic', [
                                    'agencies' => RentAgency::where(function($sub_query) {
                                        $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->where('open_state',$this->ouvert);
                                    })->orderBy($this->filter,$order)->paginate(6)
                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                ->whereNotNull('rating')->groupBy('rate')
                                ->orderBy('count','desc')
                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('website')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                                }
                            else if ($this->website==false && $this->rating!=false && $this->phone!=false && $this->ouvert==false){
                                return view('livewire.general-mechanic', [
                                    'agencies' => RentAgency::where(function($sub_query) {
                                        $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone');
                                    })->orderBy($this->filter,$order)->paginate(6)
                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                ->whereNotNull('rating')->groupBy('rate')
                                ->orderBy('count','desc')
                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                                }
                                else if ($this->website==false && $this->rating!=false && $this->phone==false && $this->ouvert!=false){
                                    return view('livewire.general-mechanic', [
                                        'agencies' => RentAgency::where(function($sub_query) {
                                            $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->where('open_state',$this->ouvert);
                                        })->orderBy($this->filter,$order)->paginate(6)
                                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                    ->whereNotNull('rating')->groupBy('rate')
                                    ->orderBy('count','desc')
                                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('rating')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                                    }
                                    else if ($this->website==false && $this->rating==false && $this->phone!=false && $this->ouvert!=false){
                                        return view('livewire.general-mechanic', [
                                            'agencies' => RentAgency::where(function($sub_query) {
                                                $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                            })->orderBy($this->filter,$order)->paginate(6)
                                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                        ->whereNotNull('rating')->groupBy('rate')
                                        ->orderBy('count','desc')
                                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('rating')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                                        }
                                        else if ($this->website!=false && $this->rating!=false && $this->phone!=false && $this->ouvert==false){
                                            return view('livewire.general-mechanic', [
                                                'agencies' => RentAgency::where(function($sub_query) {
                                                    $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone');
                                                })->orderBy($this->filter,$order)->paginate(6)
                                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                            ->whereNotNull('rating')->groupBy('rate')
                                            ->orderBy('count','desc')
                                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                                            }
                                            else if ($this->website!=false && $this->rating!=false && $this->phone==false && $this->ouvert!=false){
                                                return view('livewire.general-mechanic', [
                                                    'agencies' => RentAgency::where(function($sub_query) {
                                                        $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->where('open_state',$this->ouvert);
                                                    })->orderBy($this->filter,$order)->paginate(6)
                                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                ->whereNotNull('rating')->groupBy('rate')
                                                ->orderBy('count','desc')
                                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('website')->whereNotNull('rating')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                                                }
                                                else if ($this->website==false && $this->rating!=false && $this->phone!=false && $this->ouvert!=false){
                                                    return view('livewire.general-mechanic', [
                                                        'agencies' => RentAgency::where(function($sub_query) {
                                                            $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                                        })->orderBy($this->filter,$order)->paginate(6)
                                                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                    ->whereNotNull('rating')->groupBy('rate')
                                                    ->orderBy('count','desc')
                                                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                                                    }
                                                    else if ($this->website!=false && $this->rating==false && $this->phone!=false && $this->ouvert!=false){
                                                        return view('livewire.general-mechanic', [
                                                            'agencies' => RentAgency::where(function($sub_query) {
                                                                $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                                            })->orderBy($this->filter,$order)->paginate(6)
                                                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                        ->whereNotNull('rating')->groupBy('rate')
                                                        ->orderBy('count','desc')
                                                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('website')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                                                        }
            else{
                return view('livewire.general-mechanic', [
                    'agencies' => RentAgency::where(function($sub_query) {
                        $sub_query->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                    })->orderBy($this->filter,$order)->paginate(6)
                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                ->whereNotNull('rating')->groupBy('rate')
                ->orderBy('count','desc')
                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')
        ->count(),'withrating'=>RentAgency::whereNotNull('rating')
        ->count(),'withphone'=>RentAgency::whereNotNull('phone')
        ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
        ->count(),'total'=>RentAgency::whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
        ->limit(1)->get()]);
                } 
    
        }        
    
    
    else{
        if($this->selectedCommune!=null){
            if($this->website==false && $this->rating==false && $this->phone==false && $this->ouvert==false){
            
                return view('livewire.general-mechanic', [
                    'agencies' => RentAgency::with('commune')->where(function($sub_query) {
                        $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->orderBy($this->filter,'asc');
                    })->orderBy($this->filter,$order)->paginate(6)
                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                ->whereNotNull('rating')->groupBy('rate')
                ->orderBy('count','desc')
                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()
               ]);
            
                
                }
                else if ($this->website!=false && $this->rating==false && $this->phone==false && $this->ouvert==false){
                    return view('livewire.general-mechanic', [
                        'agencies' => RentAgency::where(function($sub_query) {
                            $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website');
                        })->orderBy($this->filter,$order)->paginate(6)
                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                    ->whereNotNull('rating')->groupBy('rate')
                    ->orderBy('count','desc')
                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                    } else if ($this->website==false && $this->rating!=false && $this->phone==false && $this->ouvert==false){
                        return view('livewire.general-mechanic', [
                            'agencies' => RentAgency::where(function($sub_query) {
                                $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating');
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                        }
                        else if ($this->website==false && $this->rating==false && $this->phone!=false && $this->ouvert==false){
                            return view('livewire.general-mechanic', [
                                'agencies' => RentAgency::where(function($sub_query) {
                                    $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone');
                                })->orderBy($this->filter,$order)->paginate(6)
                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                            ->whereNotNull('rating')->groupBy('rate')
                            ->orderBy('count','desc')
                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                            }
                            else if ($this->website==false && $this->rating==false && $this->phone==false && $this->ouvert!=false){
                                return view('livewire.general-mechanic', [
                                    'agencies' => RentAgency::where(function($sub_query) {
                                        $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->where('open_state',$this->ouvert);
                                    })->orderBy($this->filter,$order)->paginate(6)
                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                ->whereNotNull('rating')->groupBy('rate')
                                ->orderBy('count','desc')
                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                }
                            else if ($this->website!=false && $this->rating!=false && $this->phone==false && $this->ouvert==false){
                                return view('livewire.general-mechanic', [
                                    'agencies' => RentAgency::where(function($sub_query) {
                                        $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating');
                                    })->orderBy($this->filter,$order)->paginate(6)
                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                ->whereNotNull('rating')->groupBy('rate')
                                ->orderBy('count','desc')
                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('website')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                }
                                else if ($this->website!=false && $this->rating==false && $this->phone!=false && $this->ouvert==false){
                                    return view('livewire.general-mechanic', [
                                        'agencies' => RentAgency::where(function($sub_query) {
                                            $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone');
                                        })->orderBy($this->filter,$order)->paginate(6)
                                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                    ->whereNotNull('rating')->groupBy('rate')
                                    ->orderBy('count','desc')
                                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('website')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                    }
                                    else if ($this->website!=false && $this->rating==false && $this->phone==false && $this->ouvert!=false){
                                        return view('livewire.general-mechanic', [
                                            'agencies' => RentAgency::where(function($sub_query) {
                                                $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->where('open_state',$this->ouvert);
                                            })->orderBy($this->filter,$order)->paginate(6)
                                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                        ->whereNotNull('rating')->groupBy('rate')
                                        ->orderBy('count','desc')
                                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('website')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                        }
                                    else if ($this->website==false && $this->rating!=false && $this->phone!=false && $this->ouvert==false){
                                        return view('livewire.general-mechanic', [
                                            'agencies' => RentAgency::where(function($sub_query) {
                                                $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone');
                                            })->orderBy($this->filter,$order)->paginate(6)
                                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                        ->whereNotNull('rating')->groupBy('rate')
                                        ->orderBy('count','desc')
                                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                        }
                                        else if ($this->website==false && $this->rating!=false && $this->phone==false && $this->ouvert!=false){
                                            return view('livewire.general-mechanic', [
                                                'agencies' => RentAgency::where(function($sub_query) {
                                                    $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->where('open_state',$this->ouvert);
                                                })->orderBy($this->filter,$order)->paginate(6)
                                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                            ->whereNotNull('rating')->groupBy('rate')
                                            ->orderBy('count','desc')
                                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('rating')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                            }
                                            else if ($this->website==false && $this->rating==false && $this->phone!=false && $this->ouvert!=false){
                                                return view('livewire.general-mechanic', [
                                                    'agencies' => RentAgency::where(function($sub_query) {
                                                        $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                                    })->orderBy($this->filter,$order)->paginate(6)
                                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                ->whereNotNull('rating')->groupBy('rate')
                                                ->orderBy('count','desc')
                                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                                }
                                                else if ($this->website!=false && $this->rating!=false && $this->phone!=false && $this->ouvert==false){
                                                    return view('livewire.general-mechanic', [
                                                        'agencies' => RentAgency::where(function($sub_query) {
                                                            $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone');
                                                        })->orderBy($this->filter,$order)->paginate(6)
                                                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                    ->whereNotNull('rating')->groupBy('rate')
                                                    ->orderBy('count','desc')
                                                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                                    }
                                                    else if ($this->website!=false && $this->rating!=false && $this->phone==false && $this->ouvert!=false){
                                                        return view('livewire.general-mechanic', [
                                                            'agencies' => RentAgency::where(function($sub_query) {
                                                                $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->where('open_state',$this->ouvert);
                                                            })->orderBy($this->filter,$order)->paginate(6)
                                                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                        ->whereNotNull('rating')->groupBy('rate')
                                                        ->orderBy('count','desc')
                                                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('website')->whereNotNull('rating')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                                        }
                                                        else if ($this->website==false && $this->rating!=false && $this->phone!=false && $this->ouvert!=false){
                                                            return view('livewire.general-mechanic', [
                                                                'agencies' => RentAgency::where(function($sub_query) {
                                                                    $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                                                })->orderBy($this->filter,$order)->paginate(6)
                                                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                            ->whereNotNull('rating')->groupBy('rate')
                                                            ->orderBy('count','desc')
                                                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                                            }
                                                            else if ($this->website!=false && $this->rating==false && $this->phone!=false && $this->ouvert!=false){
                                                                return view('livewire.general-mechanic', [
                                                                    'agencies' => RentAgency::where(function($sub_query) {
                                                                        $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                                                    })->orderBy($this->filter,$order)->paginate(6)
                                                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                                ->whereNotNull('rating')->groupBy('rate')
                                                                ->orderBy('count','desc')
                                                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                                                                }
                    else{
                        return view('livewire.general-mechanic', [
                            'agencies' => RentAgency::where(function($sub_query) {
                                $sub_query->where('commune_id',$this->selectedCommune)->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)
                ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',$this->selectedCommune)
                ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',$this->selectedCommune)
                ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',$this->selectedCommune)
                ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
                ->limit(1)->get()]);
                        } 
            
                
        
        
        }
       else{
        if($this->website==false && $this->rating==false && $this->phone==false && $this->ouvert==false){
            
            return view('livewire.general-mechanic', [
                'agencies' => RentAgency::with('commune')->where(function($sub_query) {
                    $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->orderBy($this->filter,'asc');
                })->orderBy($this->filter,$order)->paginate(6)
            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
            ->whereNotNull('rating')->groupBy('rate')
            ->orderBy('count','desc')
            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()
           ]);
        
            
            }
            else if ($this->website!=false && $this->rating==false && $this->phone==false && $this->ouvert==false){
                return view('livewire.general-mechanic', [
                    'agencies' => RentAgency::where(function($sub_query) {
                        $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website');
                    })->orderBy($this->filter,$order)->paginate(6)
                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                ->whereNotNull('rating')->groupBy('rate')
                ->orderBy('count','desc')
                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                } else if ($this->website==false && $this->rating!=false && $this->phone==false && $this->ouvert==false){
                    return view('livewire.general-mechanic', [
                        'agencies' => RentAgency::where(function($sub_query) {
                            $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating');
                        })->orderBy($this->filter,$order)->paginate(6)
                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                    ->whereNotNull('rating')->groupBy('rate')
                    ->orderBy('count','desc')
                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                    }
                    else if ($this->website==false && $this->rating==false && $this->phone!=false && $this->ouvert==false){
                        return view('livewire.general-mechanic', [
                            'agencies' => RentAgency::where(function($sub_query) {
                                $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone');
                            })->orderBy($this->filter,$order)->paginate(6)
                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                        ->whereNotNull('rating')->groupBy('rate')
                        ->orderBy('count','desc')
                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                        }
                        else if ($this->website==false && $this->rating==false && $this->phone==false && $this->ouvert!=false){
                            return view('livewire.general-mechanic', [
                                'agencies' => RentAgency::where(function($sub_query) {
                                    $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->where('open_state',$this->ouvert);
                                })->orderBy($this->filter,$order)->paginate(6)
                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                            ->whereNotNull('rating')->groupBy('rate')
                            ->orderBy('count','desc')
                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                            }
                        else if ($this->website!=false && $this->rating!=false && $this->phone==false && $this->ouvert==false){
                            return view('livewire.general-mechanic', [
                                'agencies' => RentAgency::where(function($sub_query) {
                                    $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating');
                                })->orderBy($this->filter,$order)->paginate(6)
                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                            ->whereNotNull('rating')->groupBy('rate')
                            ->orderBy('count','desc')
                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('website')->whereNotNull('rating')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                            }
                            else if ($this->website!=false && $this->rating==false && $this->phone!=false && $this->ouvert==false){
                                return view('livewire.general-mechanic', [
                                    'agencies' => RentAgency::where(function($sub_query) {
                                        $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone');
                                    })->orderBy($this->filter,$order)->paginate(6)
                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                ->whereNotNull('rating')->groupBy('rate')
                                ->orderBy('count','desc')
                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('website')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                }
                                else if ($this->website!=false && $this->rating==false && $this->phone==false && $this->ouvert!=false){
                                    return view('livewire.general-mechanic', [
                                        'agencies' => RentAgency::where(function($sub_query) {
                                            $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->where('open_state',$this->ouvert);
                                        })->orderBy($this->filter,$order)->paginate(6)
                                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                    ->whereNotNull('rating')->groupBy('rate')
                                    ->orderBy('count','desc')
                                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('website')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                    }
                                else if ($this->website==false && $this->rating!=false && $this->phone!=false && $this->ouvert==false){
                                    return view('livewire.general-mechanic', [
                                        'agencies' => RentAgency::where(function($sub_query) {
                                            $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone');
                                        })->orderBy($this->filter,$order)->paginate(6)
                                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                    ->whereNotNull('rating')->groupBy('rate')
                                    ->orderBy('count','desc')
                                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                    }
                                    else if ($this->website==false && $this->rating!=false && $this->phone==false && $this->ouvert!=false){
                                        return view('livewire.general-mechanic', [
                                            'agencies' => RentAgency::where(function($sub_query) {
                                                $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->where('open_state',$this->ouvert);
                                            })->orderBy($this->filter,$order)->paginate(6)
                                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                        ->whereNotNull('rating')->groupBy('rate')
                                        ->orderBy('count','desc')
                                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('rating')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                        }
                                        else if ($this->website==false && $this->rating==false && $this->phone!=false && $this->ouvert!=false){
                                            return view('livewire.general-mechanic', [
                                                'agencies' => RentAgency::where(function($sub_query) {
                                                    $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                                })->orderBy($this->filter,$order)->paginate(6)
                                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                            ->whereNotNull('rating')->groupBy('rate')
                                            ->orderBy('count','desc')
                                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                            }
                                            else if ($this->website!=false && $this->rating!=false && $this->phone!=false && $this->ouvert==false){
                                                return view('livewire.general-mechanic', [
                                                    'agencies' => RentAgency::where(function($sub_query) {
                                                        $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone');
                                                    })->orderBy($this->filter,$order)->paginate(6)
                                                ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                ->whereNotNull('rating')->groupBy('rate')
                                                ->orderBy('count','desc')
                                                ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                                }
                                                else if ($this->website!=false && $this->rating!=false && $this->phone==false && $this->ouvert!=false){
                                                    return view('livewire.general-mechanic', [
                                                        'agencies' => RentAgency::where(function($sub_query) {
                                                            $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->where('open_state',$this->ouvert);
                                                        })->orderBy($this->filter,$order)->paginate(6)
                                                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                    ->whereNotNull('rating')->groupBy('rate')
                                                    ->orderBy('count','desc')
                                                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('website')->whereNotNull('rating')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                                    }
                                                    else if ($this->website==false && $this->rating!=false && $this->phone!=false && $this->ouvert!=false){
                                                        return view('livewire.general-mechanic', [
                                                            'agencies' => RentAgency::where(function($sub_query) {
                                                                $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                                            })->orderBy($this->filter,$order)->paginate(6)
                                                        ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                        WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                        WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                        WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                        WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                        ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                        ->whereNotNull('rating')->groupBy('rate')
                                                        ->orderBy('count','desc')
                                                        ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                                        }
                                                        else if ($this->website!=false && $this->rating==false && $this->phone!=false && $this->ouvert!=false){
                                                            return view('livewire.general-mechanic', [
                                                                'agencies' => RentAgency::where(function($sub_query) {
                                                                    $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('phone')->where('open_state',$this->ouvert);
                                                                })->orderBy($this->filter,$order)->paginate(6)
                                                            ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                                                            WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                                                            WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                                                            WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                                                            WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                                                            ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                                                            ->whereNotNull('rating')->groupBy('rate')
                                                            ->orderBy('count','desc')
                                                            ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('website')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                                                            }
                else{
                    return view('livewire.general-mechanic', [
                        'agencies' => RentAgency::where(function($sub_query) {
                            $sub_query->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->where('title','like', '%'.trim($this->search).'%')->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert);
                        })->orderBy($this->filter,$order)->paginate(6)
                    ,'ratings'=>RentAgency::select(\DB::raw('(CASE WHEN rating BETWEEN 4.0 AND 5.0 THEN "best"
                    WHEN rating BETWEEN 3.0 AND 4.0 THEN "good"
                    WHEN rating BETWEEN 2.0 AND 3.0 THEN "medium"
                    WHEN rating BETWEEN 1.0 AND 2.0 THEN "bad"
                    WHEN rating  BETWEEN 0 AND 1.0 THEN "verybad"
                    ELSE "others" END)  AS rate'), \DB::raw('count(1) as count'))
                    ->whereNotNull('rating')->groupBy('rate')
                    ->orderBy('count','desc')
                    ->get(),'withwebsite'=>RentAgency::whereNotNull('website')->where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withrating'=>RentAgency::whereNotNull('rating')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withphone'=>RentAgency::whereNotNull('phone')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'withopenstate'=>RentAgency::where('open_state','Ouvert 24h/24')->where('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))
            ->count(),'total'=>RentAgency::where('commune_id',$this->selectedCommune)->orWhere('commune_id',Communes::select('id')->where('name',$this->selectedPosition)->pluck('id'))->whereNotNull('website')->whereNotNull('rating')->whereNotNull('phone')->where('open_state',$this->ouvert)->count(),'addresses'=>Communes::with('wilaya')->where('name','like', '%'.$this->searchPosition.'%')
            ->limit(1)->get()]);
                    } 
        
            
    
    
       }
       
                }}
}
