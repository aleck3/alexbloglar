<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('post', 'PostController@index');
Route::get('my_details', 'UserController@my_details')->middleware('auth');
Route::get('post/addpost', 'PostController@addpost')->middleware('auth');
Route::post('post/storepost', 'PostController@storepost');
Route::get('post/contact', 'PostController@contact');
Route::post('post/sendmail', 'PostController@sendmail');
Route::get('author_details/{id}', 'UserController@author_details');
Route::get('post/{id}', 'PostController@showpost');
Route::post('post/{id}/addcomment', 'PostController@addcomment');
Route::get('post/{id}/updatepost', 'PostController@updatepost')->middleware('auth');
Route::post('post/{id}/storeupdatedpost', 'PostController@storeupdatedpost');


Auth::routes();

Route::get('/home', 'HomeController@index');
