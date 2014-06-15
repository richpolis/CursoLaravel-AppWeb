<?php

/*
 * Rutas de la aplicacion 
 */

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);

// candidatos / cateogoria-slug / categoria-id

Route::get('candidates/{slug}/{id}',['as'=>'category','uses'=>'CandidatesController@category']);

// candidato-slug / user-id
Route::get('{slug}/{id}',['as'=>'candidate','uses'=>'CandidatesController@show']);
