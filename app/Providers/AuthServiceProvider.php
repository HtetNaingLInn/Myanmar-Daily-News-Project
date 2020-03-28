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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
        Gate::define('isAdmin',function($user){
            return $user->role ==='Admin';
        });
        Gate::define('isContentWriter',function($user){
            return $user->role ==='Content Writer';
        });
        Gate::define('isAdminOrCon',function($user){
            return $user->role === 'Admin' || $user->role ==='Content Writer';
        }); 

    }
}
