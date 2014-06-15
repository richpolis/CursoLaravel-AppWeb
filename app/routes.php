<?php

/*
 * Rutas de la aplicacion 
 */

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);

Route::get('candidates/{slug}/{id}',['as'=>'category','uses'=>'CandidatesController@category']);

