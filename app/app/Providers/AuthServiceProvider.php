<?php

namespace App\Providers;

use App\Models\Review;
use App\Policies\ReviewPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies
        = [
            // 'App\Models\Model' => 'App\Policies\ModelPolicy',
            //  Review::class => ReviewPolicy::class,
        ];
    public function boot(): void
    {
        $this->registerPolicies();
        //
    }
}
