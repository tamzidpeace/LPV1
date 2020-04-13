<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajax-crud', 'AjaxController@index')->name('ajax-view');
Route::post('/ajax-crud', 'AjaxController@store')->name('get-data');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dd', 'AjaxController@dropDown')->name('dropdown');
Route::post('/get-orders', 'AjaxController@getOrders')->name('get.orders');

//test
Route::get('/t', 'TestController@test');
