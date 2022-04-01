<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified ;
use App\Events\CompletedBooking ;
use App\Events\RejectedBooking ;
use App\Events\CanceledBooking ;
use App\Events\PointsUpdated ;
use App\Events\AccountSuspended ;



use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\AddUserPoint;
use App\Listeners\incrementUserPoint;
use App\Listeners\decrementProviderPoints;
use App\Listeners\decrementClientPoints;
use App\Listeners\PointsUpdatedListener;
use App\Listeners\AccountSuspendedListner;


use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Verified::class => [
            AddUserPoint::class,
        ],
        CompletedBooking::class => [
            incrementUserPoint::class,
        ],
        CanceledBooking::class => [
            decrementClientPoints::class,
        ],
        RejectedBooking::class => [
            decrementProviderPoints::class,
        ],
        PointsUpdated::class => [
            PointsUpdatedListener::class,
        ],
        AccountSuspended::class => [
            AccountSuspendedListner::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
