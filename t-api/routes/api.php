<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country', 'CountryController@country');
Route::get('country/{id}', 'CountryController@countryById');
Route::post('create-country', 'CountryController@createCountry');
Route::post('update-country/{id}', 'CountryController@updateContry');
Route::delete('delete-country/{id}', 'CountryController@deleteCountry');