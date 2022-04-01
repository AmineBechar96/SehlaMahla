<?php

namespace App\Listeners;

use App\Events\PointsUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Point;

class PointsUpdatedListener
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
     * @param  PointsUpdated  $event
     * @return void
     */
    public function handle(PointsUpdated $event)
    {
        
        $number_of_points = $event->points->number_of_points;
        $points=Point::findOrFail( $event->points->id);
        $badge= $event->points->badge_color;

        if($number_of_points < 300 and $badge=="Silver")
        {
           $points->update(['badge_color'=>'Bronze']);
        }
       elseif($number_of_points < 600 and $badge=="Gold")
        {
           $points->update(['badge_color'=>'Silver']);
        }
        elseif($number_of_points < 1000 and $badge=="Platinium")
        {
           $points->update(['badge_color'=>'Gold']);
        }
    }
}
