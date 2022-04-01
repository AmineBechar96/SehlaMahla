<?php

namespace App\Listeners;

use App\Events\AccountSuspended;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\MemberShips;
use App\Models\Report;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountSuspendedEmail;
use App\Models\BlackListedUser;
class AccountSuspendedListner
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
     * @param  AccountSuspended  $event
     * @return void
     */
    public function handle(AccountSuspended $event)
    {
        $reports=Report::where('reported_id',$event->report->reported_id)->count();
        if($reports >= 10){
            $membership=MemberShips::where('user_id',$event->report->reported_id)->first();

            //set the status to suspended
            $membership->update(['status'=>'suspended']);

            //send email to user your account has been suspended due to your behaviour
            //since you have reach 10 reports 


            Mail::to($event->report->reported->email)->send(new AccountSuspendedEmail($event->report->reported));

            //also save the user in black list  
            BlackListedUser::create([
                'user_id'=>$event->report->reported_id,
            ]);

        }
    }
}
