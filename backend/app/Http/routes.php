<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
 *	REST API
 *
 *
 *	Usando rotas de recursos para sistema baseado em REST
 *
 *	Criando controller para recursos:
 *	php artisan make:controller PhotoController --resource
 *
 *	Criando rotas para recursos:
 *	Route::resource('photo', 'PhotoController');
 *
 *	Rotas disponiveis automaticamente:
 *                                           Método do
 *	Tipo Requisição       Rota           Controller Chamado             Descrição
 *	 GET            /photo                  index               Display a listing of the resource
 * x GET            /photo/create           create              Show the form for creating a new resource
 *	 POST           /photo                  store               Store a newly created resource in storage
 *	 GET            /photo/{id}             show                Display the specified resource
 * x GET            /photo/{id}/edit		edit                Show the form for editing the specified resource
 *	 PUT/PATCH      /photo/{id}             update              Update the specified resource in storage
 *	 DELETE         /photo/{id}             destroy             Remove the specified resource from storage
 *
 *	O que é marcado com "x" não será usado, então defina sempre quais serão usadas com 'only'
 *
 *	OBS: Para criar rotas além das principais, usar Route::get ou Route::post antes da Route::resource
 *
 */




Route::resource('prova', 'ProvaController');
Route::get('prova/{id}/bin', 'ProvaController@binario');
