<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies
        = [
             'App\Models\Model' => 'App\Policies\ModelPolicy',
        ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            return $user->hasRole('admin') ? true : null;
        });
    }
}
