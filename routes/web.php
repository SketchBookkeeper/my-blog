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

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/admin/create/post', 'PostsController@create');
Route::post('/admin/store/post', 'PostsController@store');

// Auth::routes();

// Route::get('/home', 'HomeController@index');
