<?php

namespace App\Http\Livewire;

use App\Models\recoveryTr;
use App\Models\Wilaya;
use App\Models\Communes;
use Livewire\Component;
use App\Models\Markett;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
Use \Carbon\Carbon;
class Market extends Component

{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search ;
        public function mount(){
        
    }
    public function searchagency()
    {
        $this->gotoPage(1);
        
    }
    public function render()
    {
       // $date = Carbon::now();
       // $day=strtolower($date->format('l'));
        $markets=Markett::with('commune')->paginate(6);
        return view('livewire.market',['markets' => Markett::with('commune')->where(function($sub_query) {
            $sub_query->whereIn('commune_id',Communes::select('id')->where('name','like', '%'.trim($this->search).'%'))->first();
        })->paginate(6)]);
        
    }
}
