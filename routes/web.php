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
    Route::get('post/addpost', 'PostController@addpost');
    Route::post('post/storepost', 'PostController@storepost');
    Route::get('post/{id}', 'PostController@showpost');
    Route::post('post/{id}/addcomment', 'PostController@addcomment');
    Route::get('post/{id}/updatepost', 'PostController@updatepost');
    Route::post('post/{id}/storeupdatedpost', 'PostController@storeupdatedpost');

