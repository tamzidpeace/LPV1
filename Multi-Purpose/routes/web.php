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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('get-data', 'TestController@test');
Route::get('all-data', 'TestController@allData');


Route::post('/t1/product-save', 'TestController@saveProduct')->name('product.save');
Route::get('/t1/delete/{id}', 'TestController@delete')->name('product.delete');

Route::get('/test2', 'TestController@test2');
Route::get('test4', 'TestController@test4');

// new ajax route
Route::get('/', 'CustomerController@home');

// ajax crud
Route::post('add-customer', 'CustomerController@store')->name('add-customer');