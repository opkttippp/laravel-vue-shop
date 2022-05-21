<?php

namespace App\Providers;

use App\Contracts\Video\VideoHosting;
use App\Services\CalculateSumService;
use App\Services\Video\Vimeo;
use App\Services\Video\Youtube;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {

//        $serviceVim = $this->app->makeWith(Vimeo::class, [
//            'token' => 'test'
//        ]);
//        $this->app->instance(VideoHosting::class, $serviceVim);
//        $this->app->bind(VideoHosting::class, function ($app) {
//            return new Vimeo();
//        });
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
