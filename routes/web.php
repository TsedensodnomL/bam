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

Auth::routes();

/* static pages */

Route::get('/', 'pagesController@getIndex')->name('home');

Route::get('/contact', 'pagesController@getContact')->name('contact');

Route::get('/about', 'pagesController@getAbout')->name('about');


// posts

Route::resource('/post', 'postController');

// categories

Route::resource('/category', 'categoriesController');

// tags

Route::resource('/tag', 'tagController');

// Route::resource('/tag', 'tagController');

//comments


