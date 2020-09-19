<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;

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
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.pages.master');
})->name('dashboard');


Route::group(['prefix'     => 'admin',], function () {
    Route::get('dashboard', [AdminHomeController::class, 'index'])->name('dashboard.admin');    
    Route::get('logout', [AdminHomeController::class, 'logout'])->name('logout.admin');
    Route::get('profile', [AdminHomeController::class, 'profile'])->name('logout.profile');
});
