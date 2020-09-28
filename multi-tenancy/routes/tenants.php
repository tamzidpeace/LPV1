<?php

use Illuminate\Support\Facades\Route;



$namespace = 'App\\Http\\Controllers\\Tenant\\';

Route::prefix('api')->namespace($namespace)->group(function () {
    Route::apiResource('users', 'UserController');
    Route::get('test', 'TestController@index');
    Route::get('department/store', 'TestController@store');
});