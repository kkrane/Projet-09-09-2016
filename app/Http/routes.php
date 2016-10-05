<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware'=>'auth'],function(){
    Route::resource('/user', 'UserController');
    Route::get('/user/validation/{id}', 'UserController@validation')->name('user.validation');
    Route::resource('/spot', 'SpotController');
    Route::resource('/ticket', 'TicketController');
    Route::resource('/Attribution', 'AttributionController');
    Route::get('/', 'FrontEndController@index');
    Route::get('/newspot', 'AttributionController@create');
    Route::resource('/contact','TicketController');

});

Route::get('/login', 'FrontEndController@loginForm');
Route::post('/login', 'FrontEndController@login');


Route::get('/test', 'FrontEndController@test');

Route::auth();

Route::get('/home', 'HomeController@index');