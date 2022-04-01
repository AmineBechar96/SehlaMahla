<?php

namespace App\Listeners;
use App\Models\Point;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddUserPoint
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
     * @param  Verified  $event
     * @return void
     */
    public function handle(Verified $event)
    {
       
            $user_id = $event->user->id;
            Point::create([
               'user_id' => $user_id,
               'number_of_points' => 15,
           ]); 
        
        }
        
}
