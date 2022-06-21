<?php

namespace App\Providers;

use App\Services\CalculateSumService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(CalculateSumService::class, function ($app) {
            return new CalculateSumService();
        });
    }

    public function boot()
    {
//        ---------------------подключение bootstrap к paginate---------------
//        Paginator::useBootstrapFive();
        Paginator::useBootstrap();
    }
}
