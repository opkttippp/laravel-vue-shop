<?php

namespace App\Providers;

use App\Component\SuperComponent;
use Illuminate\Support\ServiceProvider;

class SuperSesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SuperComponent::class, function () {
            return new SuperComponent('Conchenko');
        });
    }

    public function boot()
    {
        //
    }
}
