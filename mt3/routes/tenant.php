<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware(['web', InitializeTenancyByDomain::class, PreventAccessFromCentralDomains::class,])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Route::get('/login', function () {
    //     return view('auth.login');
    // });

    // Route::get('/register', function () {
    //     return view('auth.register');
    // });    
});


Route::middleware(['api', InitializeTenancyByDomain::class, PreventAccessFromCentralDomains::class,])->group(function () {
    
    
    //Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('index', 'AuthController@index');
});
