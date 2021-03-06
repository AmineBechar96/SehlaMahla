<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isClient', function($user){
           return $user->role == 'Client';
        });
        Gate::define('isProvider', function($user){
            return $user->role == 'Provider';
         });
         Gate::define('isGoing', function($user){
            return $user->memberships->status == 'ongoing';
         });
         Gate::define('isActive', function($user){
            return $user->memberships->status == 'ongoing';
         });
    }
}
