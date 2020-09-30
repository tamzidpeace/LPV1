<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::$onFail = function () {
            return redirect('https://localhost:8000.com/');
        };
    }
}
