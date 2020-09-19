<?php

use Illuminate\Support\Facades\Route;


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
Route::get('view-customer', 'CustomerController@view')->name('customer.view');
Route::get('view-customer-single', 'CustomerController@viewSingle')->name('customer.view.single');
Route::get('destroy', 'CustomerController@destroy')->name('customer.destroy');
Route::post('edit', 'CustomerController@edit')->name('customer.edit');
Route::get('load-after-add', 'CustomerController@loadAfterAdd')->name('customer.load.after.add');
Route::get('load-paginate', 'CustomerController@loadPaginate')->name('customer.load.paginate');

// auto complete & search
Route::get('auto-complete', 'AjaxRestController@index');
Route::get('auto-complete-data', 'AjaxRestController@getData');
Route::get('auto-search', 'AjaxRestController@autoSearch');

// blade
Route::get('blade', 'TestController@blade');
Route::get('blade-form', 'TestController@bladeForm')->name('blade.form');

//data test 
Route::get('/date', 'TestController@date');