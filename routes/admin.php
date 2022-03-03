<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['auth:admin'],'prefix'=>'admin'], function () {

    Route::get('/','WelcomeController@index')->name('welcome');
    //logout route
    Route::post('logout', 'AuthController@logout')->name('logout');

    Route::resource('owner', 'OwnerController')->except('show');

    Route::resource('user', 'UserController')->except('show');

    Route::resource('home', 'HomeController')->except('show');


});  /** End of Route Group  */



/** Start Auth Section */

Route::group(['middleware'=>'guest:admin','prefix'=>'admin'], function () {

    Route::get('login', 'AuthController@getLogin')->name('getLogin');
    Route::post('login', 'AuthController@login')->name('login');

});
