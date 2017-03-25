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

Route::get('exemplo','WelcomeControler@exemplo');

Route::resource('main','MainController');


Route::resource('category','CategoryController');
Route::resource('product','ProductController');
Route::resource('provider','ProviderController');
Route::resource('productbatch','ProductBatchController');
Route::resource('batch','BatchController');




Route::resource('/', 'MainController');
