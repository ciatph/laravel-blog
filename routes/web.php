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


$stripe = App::make('App\Billing\Stripe');

Route::get('/', 'PostController@index');

Route::get('/posts', 'PostController@index');

Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts', 'PostController@store');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('home', function() {
    return view('welcome');
});

Auth::routes();
