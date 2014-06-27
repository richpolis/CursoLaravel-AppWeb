<?php

/*
 * Rutas de la aplicacion 
 */

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);

// candidatos / cateogoria-slug / categoria-id

Route::get('candidates/{slug}/{id}',['as'=>'category','uses'=>'CandidatesController@category']);

// candidato-slug / user-id
Route::get('{slug}/{id}',['as'=>'candidate','uses'=>'CandidatesController@show']);

Route::group(['before'=>'guest'],function(){
	// registro de usuario
	Route::get('sign-up',['as'=>'sign_up','uses'=>'UsersController@signUp']);
	Route::post('sign-up',['as'=>'register','uses'=>'UsersController@register']);
});


Route::post('login',['as'=>'login','uses'=>'AuthController@login']);

Route::group(['before'=>'auth'],function(){

	Route::get('logout',['as'=>'logout','uses'=>'AuthController@logout']);
	// formularios
	Route::get('account',['as'=>'account','uses'=>'UsersController@account']);
	Route::put('account',['as'=>'update_account','uses'=>'UsersController@updateAccount']);
	Route::get('profile',['as'=>'profile','uses'=>'UsersController@profile']);
	Route::put('profile',['as'=>'update_profile','uses'=>'UsersController@updateProfile']);
	
});
