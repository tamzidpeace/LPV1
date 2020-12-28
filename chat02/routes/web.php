<?php

use App\Events\FormSubmitted;
use App\Events\TestNotification;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Pusher\Pusher;

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

Route::get('counter', function () {
    return view('counter');
});


Route::get('sender', function () {
    return view('sender');
});


Route::post('sender', function (Request $request) {
    event(new FormSubmitted($request->content));
    return back();
})->name('sender');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {
    return view('test');
});

Route::get('test2', function (Request $request) {
    $count = $request->id;
    $count++;
    event(new TestNotification($count));
    return $count;
});
