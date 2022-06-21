<?php

namespace App\Providers;

use App\Components\SuperComponent;
use Illuminate\Support\ServiceProvider;

class SuperSesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SuperComponent::class, function () {
            $res = new SuperComponent('Vovan');
            return $res;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
