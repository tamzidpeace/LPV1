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

Route::get('/t1', 'TestController@test');

Route::post('/t1/product-save', 'TestController@saveProduct')->name('product.save');
Route::get('/t1/delete/{id}', 'TestController@delete')->name('product.delete');
