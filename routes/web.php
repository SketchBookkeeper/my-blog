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

// Frontend
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/{post}', 'PostsController@show');

// Backend
Route::get('/admin/create/post', 'PostsController@create');
Route::post('/admin/store/post', 'PostsController@store');

Route::get('/admin/tags', 'TagsController@create');
Route::post('/admin/store/tag', 'TagsController@store');
Route::delete('/admin/delete/tag', 'TagsController@destroy');

// Route::get('/home', 'HomeController@index');
