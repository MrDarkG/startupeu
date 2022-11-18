<?php

namespace App\Providers;

use App\Interfaces\AdminServiceInterface;
use App\Services\AdminServices;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->app->bind(AdminServiceInterface::class, function ($app) {
//            return new AdminServices();
//        });
    }
}
