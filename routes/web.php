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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Clientes
Route::get('/clientes', 'ClienteController@index')->name('clientes.index'); //para mostrar todos los clientes
Route::get('/clientes/create', 'ClienteController@create')->name('clientes.create'); //renderizar la vista de creacion
Route::post('/clientes', 'ClienteController@store')->name('clientes.store'); //guardar el form (crear un cliente)
Route::get('/clientes/{cliente}', 'ClienteController@show')->name('clientes.show'); //ver datos de un solo cliente
Route::get('/clientes/{cliente}/edit', 'ClienteController@edit')->name('clientes.edit'); //renderizar el form para editar un cliente
Route::put('/clientes/{cliente}', 'ClienteController@update')->name('clientes.update'); //guardar lo que modificamos en el form de edicion
Route::delete('clientes/{cliente}', 'ClienteController@destroy')->name('clientes.destroy'); //eliminar un cliente

//Direcciones
Route::get('/direcciones', 'DireccionController@index')->name('direcciones.index'); //para mostrar todos los direcciones
Route::get('/direcciones/create', 'DireccionController@create')->name('direcciones.create'); //renderizar la vista de creacion
Route::post('/direcciones', 'DireccionController@store')->name('direcciones.store'); //guardar el form (crear una direccion)
Route::get('/direcciones/{direccion}', 'DireccionController@show')->name('direcciones.show'); //ver datos de un solo direccion
Route::get('/direcciones/{direccion}/edit', 'DireccionController@edit')->name('direcciones.edit'); //renderizar el form para editar un direccion
Route::put('/direcciones/{direccion}', 'DireccionController@update')->name('direcciones.update'); //guardar lo que modificamos en el form de edicion
Route::delete('direcciones/{direccion}', 'DireccionController@destroy')->name('direcciones.destroy'); //eliminar una direccion


