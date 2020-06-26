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

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

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


//carga de provincias con ajax
Route::get('paises/{pais}', 'DireccionController@obtenerProvincias')->name('paises.obtenerProvincias');

//carga de localidades con ajax
Route::get('provincias/{provincia}', 'DireccionController@obtenerLocalidades')->name('provincias.obtenerLocalidades');

//Proveedores
Route::get('/proveedores', 'ProveedorController@index')->name('proveedores.index'); //para mostrar todos los proveedores
Route::get('/proveedores/create', 'ProveedorController@create')->name('proveedores.create'); //renderizar la vista de creacion
Route::post('/proveedores', 'ProveedorController@store')->name('proveedores.store'); //guardar el form (crear una direccion)
Route::get('/proveedores/{proveedor}', 'ProveedorController@show')->name('proveedores.show'); //ver datos de un solo proveedor
Route::get('/proveedores/{proveedor}/edit', 'ProveedorController@edit')->name('proveedores.edit'); //renderizar el form para editar un proveedor
Route::put('/proveedores/{proveedor}', 'ProveedorController@update')->name('proveedores.update'); //guardar lo que modificamos en el form de edicion
Route::delete('proveedores/{proveedor}', 'ProveedorController@destroy')->name('proveedores.destroy'); //eliminar una proveedor


//Equipos
Route::get('/equipos', 'EquipoController@index')->name('equipos.index'); //para mostrar todos los equipos
Route::get('/equipos/create', 'EquipoController@create')->name('equipos.create'); //renderizar la vista de creacion
Route::post('/equipos', 'EquipoController@store')->name('equipos.store'); //guardar el form (crear un equipo)
Route::get('/equipos/{equipo}', 'EquipoController@show')->name('equipos.show'); //ver datos de un solo equipo
Route::get('/equipos/{equipo}/edit', 'EquipoController@edit')->name('equipos.edit'); //renderizar el form para editar un equipo
Route::put('/equipos/{equipo}', 'EquipoController@update')->name('equipos.update'); //guardar lo que modificamos en el form de edicion
Route::delete('equipos/{equipo}', 'EquipoController@destroy')->name('equipos.destroy'); //eliminar un equipo

//Equipos
Route::get('/partes', 'ParteController@index')->name('partes.index'); //para mostrar todos los partes
Route::get('/partes/create', 'ParteController@create')->name('partes.create'); //renderizar la vista de creacion
Route::post('/partes', 'ParteController@store')->name('partes.store'); //guardar el form (crear un parte)
Route::get('/partes/{parte}', 'ParteController@show')->name('partes.show'); //ver datos de un solo parte
Route::get('/partes/{parte}/edit', 'ParteController@edit')->name('partes.edit'); //renderizar el form para editar un parte
Route::put('/partes/{parte}', 'ParteController@update')->name('partes.update'); //guardar lo que modificamos en el form de edicion
Route::delete('partes/{parte}', 'ParteController@destroy')->name('partes.destroy'); //eliminar un parte

