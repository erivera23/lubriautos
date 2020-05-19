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
    return view('auth.login');
});

Route::resource('clientes', 'ClientesController')->middleware('auth');

//Route::get('/clientes', 'ClientesController@index');
//Route::get('/clientes/crear', 'ClientesController@create');

Auth::routes();
//Auth::routes(['register'=>false, 'reset'=>false]); invalidar rutas

Route::get('/home', 'ClientesController@index')->name('clientes');

//Productos
Route::get('/productos', 'ProductosController@index')->name('productos');
Route::get('/productos/create','ProductosController@create')->name('productos');
Route::post('/productos', 'ProductosController@store')->name('productos');
Route::get('productos/{id}/edit', 'ProductosController@edit')->name('productos');
Route::patch('productos/{id}', 'ProductosController@update')->name('productos');

//Inventario
Route::get('/inventario','InventarioController@index')->name('inventario');
Route::get('/inventario/create','InventarioController@create')->name('inventario');
Route::get('/inventario/create/{id}', 'InventarioController@create')->name('inventario');
Route::get('/inventario/{id}/entrada', 'InventarioController@entrada')->name('inventario');
Route::get('/inventario/{id}/salida','InventarioController@salida')->name('inventario');

Route::post('/inventario/entrada/{id}', 'InventarioController@storeEntrada')->name('inventario');
Route::post('/inventario/salida/{id}', 'InventarioController@storeSalida')->name('inventario');
Route::post('/inventario', 'InventarioController@store')->name('inventario');

//Clientes
Route::get('/clientes', 'ClientesController@index')->name('clientes');
Route::get('/clientes-empresariales', 'ClientesController@indexCompany')->name('clientes');
