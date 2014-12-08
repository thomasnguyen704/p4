<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/**
* Debug
* (Implicit Routing)
*/
Route::controller('debug', 'DebugController');


/**
* User
* (Explicit Routing)
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


/**
* Product
* (Implicit Routing)
*/
Route::controller('product', 'ProductController');


/**
* Product
* (Implicit Routing)
*/
Route::controller('company', 'CompanyController');


# Homepage
Route::get("/", function() {
	return View::make("index");
});



