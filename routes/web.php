<?php

use Illuminate\Support\Facades\Route;


    Route::get('/','HomeController@index')->name('home');

    Route::get('/details/{id}','HomeController@details')->name('details');

Route::group(['middleware' => 'frontAuth:owner_user'], function () {

    Route::get('/logout', 'AuthController@logout')->name('front.logout');

    Route::post('/reserve/{id}', 'HomeController@reserve')->name('front.reserve');

});

Route::group(['middleware' => 'frontAuth:owner'], function () {

    Route::resource('add_home', 'OwnerController');
    Route::get('show_reserved', 'HomeController@show_reserv')->name('show_reserved');
    Route::delete('delete_reserved/{id}', 'HomeController@delete_reserved')->name('delete_reserved');

});




Route::group(['middleware' => 'guestfront'], function () {
    Route::match(['get', 'post'],'/login','AuthController@login')->name('front.login');
    Route::match(['get', 'post'],'/register','AuthController@register')->name('front.register');
});
