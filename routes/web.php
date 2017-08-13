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

// app/Http/routes.php


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

	Route::get('/', function () {
    	return view('welcome');
	});

	Route::get('/', 'RedirectPageController@start');

	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('posts', 'admin\PostController@index');
	Route::post('newpost', 'admin\PostController@store');
	

});