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

Route::get('/upload', 'FtpController@index');
Route::post('/upload', 'FtpController@store')->name('image');
Route::get('/get-by-directory', 'FtpController@getByDirectory')->name('retrieve');
Route::get('/get-by-year', 'FtpController@getByYear');
