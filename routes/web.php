<?php

use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@index')->name('home');


Route::get('/details/{id}','HomeController@details')->name('details');



Route::get('/logout', 'AuthController@logout')->name('front.logout');



Route::group(['middleware' => 'guestfront'], function () {

Route::get('/login','AuthController@login')->name('front.login');

Route::post('/login','AuthController@login_post')->name('front.login_post');

Route::get('/register','AuthController@register')->name('front.register');


});
