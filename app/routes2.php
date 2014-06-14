<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'WebController@index');

Route::get('/contact', 'WebController@get_contact');
Route::post('/contact', 'WebController@post_contact');

Route::get(Lang::get('routes.login'), 'UserController@get_login');
Route::post(Lang::get('routes.login'), 'UserController@post_login');
Route::get(Lang::get('routes.logout'), 'UserController@logout');
Route::get('/signup', 'UserController@get_signup');
Route::post('/signup', 'UserController@post_signup');
Route::get('/dashboard', 'UserController@dashboard');

Route::get('/articulo/{url}', 'PostController@post');
Route::post('/post/{url}/comment', 'PostController@comment');

Route::group(array('prefix' => 'admin'), function()
{
	Route::group(array('before' => 'admin'), function()
	{
		Route::get('/', 'AdminController@index');

		Route::get('/posts', 'AdminController@posts_all');
		Route::get('/posts/add', 'AdminController@get_add');
		Route::post('/posts/add', 'AdminController@post_add');
		Route::get('/posts/{id}', 'AdminController@post');
		Route::post('/posts/edit/{id}', 'AdminController@post_edit');

		Route::get('/categories', 'AdminController@categories');
		Route::post('/categories/add', 'AdminController@categories_add');
		Route::get('/categories/edit/{id}', 'AdminController@categories_get_edit');
		Route::post('/categories/edit/{id}', 'AdminController@categories_post_edit');
		Route::get('/categories/delete/{id}', 'AdminController@categories_delete');
	});
});