<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administrador', function (User $user){
            return $user->rol_id === 1;
        });

        Gate::define('digitador', function (User $user){
            return $user->rol_id === 2;
        });

        Gate::define('supervisor', function (User $user){
            return $user->rol_id === 3;
        });
    }
}
