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
Route::get('/export/{type}', 'OrderController@Export')->name('order.export');
Route::get('get-file/{filename}', ['as' => 'getFile', 'uses' => 'OrderController@get_file']);

