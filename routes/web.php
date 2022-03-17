<?php

use Illuminate\Support\Facades\Route;


    Route::get('/','HomeController@index')->name('home');
    Route::get('/details/{id}','HomeController@details')->name('details');

Route::group(['middleware' => 'frontAuth:owner_user'], function () {

    Route::get('/logout', 'AuthController@logout')->name('front.logout');
    Route::get('/reserve', 'HomeController@reserve')->name('front.reserve');

});

Route::group(['middleware' => 'frontAuth:owner'], function () {
    Route::resource('add_home', 'OwnerController');
});




Route::group(['middleware' => 'guestfront'], function () {


    Route::match(['get', 'post'],'/login','AuthController@login')->name('front.login');


//    Route::post('/login','AuthController@login_post')->name('front.login_post');


    Route::match(['get', 'post'],'/register','AuthController@register')->name('front.register');

//    Route::post('/register','AuthController@register_post')->name('front.register_post');

});
