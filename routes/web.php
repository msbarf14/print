<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');
// merchant
Route::resource('/merchant', 'MerchantController');
Route::post('/merchant/{id}', 'MerchantController@update');
// user

Route::resource('/user','UserController');
Route::post('/user/{id}', 'UserController@update');

// order
Route::resource('/order','OrderController');
Route::post('/import', 'OrderController@postUpload')->name('order.import');
Route::post('/list/{list}', 'OrderController@list');
Route::post('/proccess/{proccess}', 'OrderController@proccess');
Route::post('/finish/{finish}', 'OrderController@finish');

// user order
Route::get('/orderUser/{order}', 'OrderController@order');

