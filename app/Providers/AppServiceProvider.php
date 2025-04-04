<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Services\UserService;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Registrar el servicio en el contenedor
        $this->app->singleton(UserService::class, function ($app) {
            return new UserService();
        });

        $this->app->singleton(BlockchainService::class, function ($app) {
            return new BlockchainService();
        });

        $this->app->singleton(CommissionService::class, function ($app) {
            return new CommissionService();
        });

        $this->app->singleton(\App\Services\ProductionService::class, function ($app) {
            return new \App\Services\ProductionService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        /*
        if(env('APP_ENV') === 'production') {
         \URL::forceScheme('https');*/
    }
}
