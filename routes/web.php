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
// order
Route::resource('/order','OrderController');


