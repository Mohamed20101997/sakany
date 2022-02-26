<?php

use Illuminate\Support\Facades\Route;
// Route::get('/','HomeController@home')->name('home');

//Route::group(['middleware'=>'authStudent:student'], function () {
//
//    Route::get('/subjects/{semester_id}','FrontController@getSubjects')->name('front.getSubjects');
//
//    Route::get('/uploads/{subject_id}','FrontController@uploads')->name('front.uploads');
//
//
//    Route::get('/getModel','FrontController@get_model')->name('front.get_model');
//
//});  /** End of Route Group Student  */


Route::get('/','HomeController@index')->name('home');

Route::get('/','HomeController@index')->name('home');

Route::get('/details','HomeController@details')->name('details');


Route::get('/login','HomeController@login')->name('front.login');
Route::get('/register','HomeController@register')->name('front.register');


