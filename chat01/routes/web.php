<?php

use App\Mail\TestAmazonSes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Events\DummyEvent;

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {
   // $user = Auth::user();
    event(new DummyEvent('hello'));
    return view('test');
});

Route::get('test-p', function() {
    return view('test_print');
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('payment', 'HomeController@payment');

Route::get('test-email', 'HomeController@testEmail');

Route::get('test-email2', function () {
    Mail::to('email@doe.com')->send(new TestAmazonSes('It works!'));
});

Route::get('test_print3', 'HomeController@testPrint3');
