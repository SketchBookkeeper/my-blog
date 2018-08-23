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
Route::get('/', function () {
    return (new \App\Http\Controllers\PostsController)->index(5);
})->name('home');
Route::get('/posts/{post}', 'PostsController@show');

// Backend
Route::get('/admin/posts', 'PostsController@manage');
Route::get('/admin/create/post', 'PostsController@create');
Route::get('/admin/edit/post/{post}', 'PostsController@edit');
Route::post('/admin/store/post', 'PostsController@store');
Route::post('/admin/update/post', 'PostsController@update');
Route::delete('/admin/delete/post', 'PostsController@destroy');

Route::get('/admin/tags', 'TagsController@manage');
Route::get('/admin/edit/tag/{tag}', 'TagsController@edit');
Route::post('/admin/store/tag', 'TagsController@store');
Route::post('/admin/update/tag', 'TagsController@update');
Route::delete('/admin/delete/tag', 'TagsController@destroy');

// Route::get('/home', 'HomeController@index');
