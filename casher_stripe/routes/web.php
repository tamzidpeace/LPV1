<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/subscription/create', ['as'=>'home','uses'=>'SubscriptionController@index'])->name('subscription.create');
Route::post('order-post', ['as'=>'order-post','uses'=>'SubscriptionController@orderPost']);

//learn cashier
Route::get('cashier_index', 'SubscriptionController@cashierIndex')->name('cashier.index');
