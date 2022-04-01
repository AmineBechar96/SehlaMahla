<?php

namespace App\Listeners;

use App\Events\CompletedBooking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Point;

class incrementUserPoint
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
     * @param  CompletedBooking  $event
     * @return void
     */
    public function handle(CompletedBooking $event)
    {

            //add 2 point to the client
            //dd($event);
            $client_id = $event->booking->user_id;
            $pointC=Point::where('user_id',$client_id)->first();
            $pointC->increment('number_of_points', 2);
            /*
            if($pointC->number_of_points >= 300 and $pointC->badge_color=="Bronze")
            {
            $pointC->update(['badge_color'=>"Silver"]);

            }
            elseif($pointC->number_of_points >= 600 and $pointC->badge_color=="Silver")
            {
              $pointC->update(['badge_color'=>'Gold']);
               
            }
            elseif($pointC->number_of_points >= 1000 and $pointC->badge_color=="Gold")
            {
              $pointCC->update(['badge_color'=>'Platinium']);
              

            }*/
            

            //add 2 point to the provider
            $provider_id = $event->booking->service->user_id;
            $pointP=Point::where('user_id',$provider_id)->first();
            $pointP->increment('number_of_points', 2);
           

            /*if($pointP->number_of_points >= 300 and $pointP->badge_color=="Bronze")
            {
               $pointP->update(['badge_color'=>'Silver']);
            }
            if($pointP->number_of_points >= 600 and $pointP->badge_color=="Silver")
            {
               $pointP->update(['badge_color'=>'Gold']);
            }
            if($pointP->number_of_points >= 1000 and $pointP->badge_color=="Gold")
            {
               $pointP->update(['badge_color'=>'Platinium']);
            }*/
    }
}
