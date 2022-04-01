<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rating;


class ShowRatings extends Component
{
    public $agency_id;
    public $agency_type;

    
    public function render()
    {
        $rating=Rating::where('service_rated_id',$agency_id)->where('service_type',$agency_type)->get();
        return view('livewire.show-ratings',compact('rating'));
    }
}
