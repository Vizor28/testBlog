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

Route::get('/', 'CategoryController@index');

Route::get('/category/{id}', 'CategoryController@show')->where('id', '[0-9]+');
Route::get('/category/edit/{id}', 'CategoryController@edit')->where('id', '[0-9]+');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category/update', 'CategoryController@update');
Route::post('/category/store', 'CategoryController@store');
Route::get('/category/delete/{id}', 'CategoryController@destroy')->where('id', '[0-9]+');

Route::get('/post/{id}', 'PostController@show')->where('id', '[0-9]+');
Route::get('/post/edit/{id}', 'PostController@edit')->where('id', '[0-9]+');
Route::get('/post/create/{cat_id}', 'PostController@create')->where('cat_id', '[0-9]+');
Route::post('/post/update', 'PostController@update');
Route::post('/post/store', 'PostController@store');
Route::get('/post/delete/{id}', 'PostController@destroy')->where('id', '[0-9]+');


Route::post('/comment/store', 'CommentController@store');
