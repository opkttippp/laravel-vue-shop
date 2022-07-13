<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
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
        Product::observe(ProductObserver::class);
//        ---------------------подключение bootstrap к paginate---------------
//        Paginator::useBootstrapFive();
        Paginator::useBootstrap();
    }
}
