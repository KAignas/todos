<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/photo/{directory}/{filename}', 'ImagesController@show')->name('image.show');


	Route::group(['middleware' => 'guest'], function(){
		Route::get('/login', 'Auth\LoginController@index')->name('login');
		Route::post('/login', 'Auth\LoginController@post')->name('login');
		Route::get('/signup', 'Auth\SignupController@index')->name('signup');
		Route::post('/signup', 'Auth\SignupController@post')->name('signup');
	});



	Route::group(['middleware' => 'auth'], function(){
        Route::get('/', 'EventsController@index')->name('home');
        Route::get('/create', 'EventsController@create')->name('event.create');
        Route::post('/create', 'EventsController@store')->name('event.create');
        Route::get('/{event}/complete', 'EventsController@complete')->name('event.complete');
        Route::get('/{event}/delete', 'EventsController@delete')->name('event.delete');
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	});
