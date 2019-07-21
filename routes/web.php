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

Route::get('/','PostsController@index')->name('index');
Route::get('posts/{post}/{slug?}','PostsController@show')->name('posts.show');
Route::get('categories/{category}','CategoriesController@show')->name('categories.show');

Route::post('/posts/{post}/reply','RepliesController@store')->name('replies.front.store');
Route::delete('/replies/{reply}','RepliesController@destroy')->name('replies.front.delete');

Route::post('/search','PostsController@search')->name('search');
