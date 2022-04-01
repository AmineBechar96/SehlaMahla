<?php

namespace App\Listeners;

use App\Events\RejectedBooking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Point;

class decrementProviderPoints
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RejectedBooking  $event
     * @return void
     */
    public function handle(RejectedBooking $event)
    {
         //add 2 point to the provider
         $provider_id = $event->booking->service->user_id;
         $pointP=Point::where('user_id',$provider_id)->first();
         $pointP->decrement('number_of_points', 1);
         $pointP=Point::where('user_id',$provider_id)->first();

        /* if($pointP->number_of_points < 300 and $pointP->badge_color=="Silver")
         {
            $pointP->update(['badge_color'=>'Bronze']);
         }
         if($pointP->number_of_points < 600 and $pointP->badge_color=="Gold")
         {
            $pointP->update(['badge_color'=>'Silver']);
         }
         if($pointP->number_of_points < 1000 and $pointP->badge_color=="Platinium")
         {
            $pointP->update(['badge_color'=>'Gold']);
         }*/
    }
}
