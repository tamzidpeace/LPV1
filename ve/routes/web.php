<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('qr', 'HomeController@qr');
Route::get('sms', 'HomeController@sms');
Route::get('/send-email', 'HomeController@sendEmail');
Route::get('time_zone', 'HomeController@timeZone');
Route::get('session', 'HomeController@session');

Route::get('jq-image-upload', 'HomeController@imageUpload');

Route::get('dropzone/test', 'HomeController@dropZone');
 
Route::post('dropzone/upload_image', 'HomeController@upload_image')->name('dropzone.upload_image');
 
Route::get('dropzone/fetch_image', 'HomeController@fetch_image')->name('dropzone.fetch_image');
 
Route::get('dropzone/delete_image', 'HomeController@delete_image')->name('dropzone.delete_image');


Route::get('test/image/upload', 'HomeController@testImageUpload');