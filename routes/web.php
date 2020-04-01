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

//Listagem de clientes
Route::get('/', ['as' => 'clientes.index', 'uses' => 'ClienteController@index']);

//Criação de clientes
Route::get('/cliente', ['as' => 'clientes.create', 'uses' => 'ClienteController@create']);
Route::post('/cliente', ['as' => 'clientes.store', 'uses' => 'ClienteController@store']);

//Editar registro
Route::get('/cliente/{id}', ['as' => 'clientes.edit', 'uses' => 'ClienteController@edit']);
Route::put('/cliente/{id}', ['as' => 'clientes.update', 'uses' => 'ClienteController@update']);

//deletar cliente
Route::delete('/clientes',['as' => 'clientes.delete', 'uses' => 'ClienteController@delete']);

