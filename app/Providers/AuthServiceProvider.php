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


        /* define a admin user role */
        Gate::define('isAdmin', function ($user) {
            return null !== $user->roles->whereIn('name', 'Admin')->first();
        });

        /* define a manager user role */
        Gate::define('isManager', function ($user) {
            return null !== $user->roles->whereIn('name', 'Manage')->first();
        });

        /* define a user role */
        Gate::define('isUser', function ($user) {
            return null !== $user->roles->whereIn('name', 'User')->first();
        });
    }
}
