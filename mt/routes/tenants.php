<?php

use Illuminate\Support\Facades\Route;



$namespace = 'App\\Http\\Controllers\\Tenant\\';

Route::prefix('api')->namespace($namespace)->group(function () {
    Route::get('test', 'TestController@index');
});
