<?php

namespace App\Listeners;

use App\Events\CanceledBooking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Point;

class decrementClientPoints
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
     * @param  CanceledBooking  $event
     * @return void
     */
    public function handle(CanceledBooking $event)
    {
            //remove 1 point to the client
            $client_id = $event->booking->user_id;
            $pointC=Point::where('user_id',$client_id)->first();
            $pointC->decrement('number_of_points', 1);
           

            /*if($pointC->number_of_points < 300 and $pointC->badge_color=="Silver")
            {
               $pointC->update(['badge_color'=>'Bronze']);
            }
            if($pointC->number_of_points < 600 and $pointC->badge_color=="Gold")
            {
               $pointC->update(['badge_color'=>'Silver']);
            }
            if($pointC->number_of_points < 1000 and $pointC->badge_color=="Platinium")
            {
               $pointC->update(['badge_color'=>'Gold']);
            }*/
    }
}
