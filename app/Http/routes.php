<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'cors', 'prefix' => '/'], function(){
	Route::resource('articles', 'ArticlesController');
	Route::resource('legends', 'LegendsController');
	Route::resource('news', 'NewsController');
	Route::resource('male', 'MaleController');
	Route::resource('female', 'FemaleController');
	Route::resource('group-band', 'GroupBandController');
	Route::resource('exclusive-story', 'ExclusiveStoryController');
	Route::resource('exclusive-interview', 'ExclusiveInterviewController');
	Route::resource('backstage-story', 'BackstageStoryController');
	Route::resource('fashion', 'FashionController');
	Route::resource('event-organizer', 'EventOrganizerController');
	Route::resource('albums', 'AlbumsController');
	Route::resource('movies-tv', 'MoviesTVController');
});
