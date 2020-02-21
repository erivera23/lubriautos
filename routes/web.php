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

Route::get('/home', 'ClientesController@index')->name('home');

//Productos
Route::get('/productos', 'ProductosController@index')->name('productos');
Route::get('/productos/create','ProductosController@create')->name('productos');
Route::post('/productos', 'ProductosController@store')->name('productos');
Route::get('productos/{id}/edit', 'ProductosController@edit')->name('productos');
Route::patch('productos/{id}', 'ProductosController@update')->name('productos');

//Inventario
Route::get('/inventario','InventarioController@index')->name('inventario');
Route::get('/inventario/create', 'InventarioController@create')->name('inventario');
Route::get('/inventario/entrada', 'InventarioController@entrada')->name('inventario');
Route::get('/inventario/salida','InventarioController@salida')->name('inventario');
Route::get('inventario/{id}/edit', 'InventarioController@edit')->name('inventario');

Route::post('/inventario', 'InventarioController@store')->name('inventario');
