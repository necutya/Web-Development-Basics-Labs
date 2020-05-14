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
Route::get('/', 'BlogController@index');
Route::get('/home', 'BlogController@index');

Route::get('/about', 'BlogController@about');

Route::get('/post/{post}', 'BlogController@show_post');
Route::get('/create_post', 'BlogController@create_post');
Route::post('/create_post', 'BlogController@check_created_post');

Route::get('hashtag/{hashtag_id}', 'BlogController@posts_with_hashtag');

Route::get('/user/{user_id}', 'BlogController@show_user_posts');

Route::get('/login', 'SessionController@login');
Route::post('/login', 'SessionController@check_login');
Route::get('/logout', 'SessionController@logout');

Route::get('/register', 'RegistrationController@register');
Route::post('/register', 'RegistrationController@check_register');

