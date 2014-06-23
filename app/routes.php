<?php

/*
 * Rutas de la aplicacion 
 */

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);

// candidatos / cateogoria-slug / categoria-id

Route::get('candidates/{slug}/{id}',['as'=>'category','uses'=>'CandidatesController@category']);

// candidato-slug / user-id
Route::get('{slug}/{id}',['as'=>'candidate','uses'=>'CandidatesController@show']);

// registro de usuario
Route::get('sign-up',['as'=>'sign_up','uses'=>'UsersController@signUp']);
Route::post('sign-up',['as'=>'register','uses'=>'UsersController@register']);