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
//Auth::routes(['register'=>false, 'reset'=>false]); //invalidar rutas

//HOME
Route::get('/home', 'InventarioController@index')->name('inventario');

//Productos
Route::get('/productos', 'ProductosController@index')->name('productos');
Route::get('/productos/create','ProductosController@create')->name('productos')->middleware('auth');
Route::post('/productos', 'ProductosController@store')->name('productos');
Route::get('productos/{id}/edit', 'ProductosController@edit')->name('productos')->middleware('auth');
Route::patch('productos/{id}', 'ProductosController@update')->name('productos');

//Inventario
Route::get('/inventario','InventarioController@index')->name('inventario');
Route::get('/inventario/create','InventarioController@create')->name('inventario')->middleware('auth');
Route::get('/inventario/create/{id}', 'InventarioController@create')->name('inventario')->middleware('auth');
Route::get('/inventario/{id}/entrada', 'InventarioController@entrada')->name('inventario')->middleware('auth');
Route::get('/inventario/{id}/salida','InventarioController@salida')->name('inventario')->middleware('auth');

Route::post('/inventario/entrada/{id}', 'InventarioController@storeEntrada')->name('inventario')->middleware('auth');
Route::post('/inventario/salida/{id}', 'InventarioController@storeSalida')->name('inventario')->middleware('auth');
Route::post('/inventario', 'InventarioController@store')->name('inventario');

//Clientes
Route::get('/clientes', 'ClientesController@index')->name('clientes');
Route::get('/clientes-busqueda', 'ClientesController@busqueda')->name('clientes')->middleware('auth');
Route::get('/clientes-empresariales', 'ClientesController@indexCompany')->name('clientes');

//Vehiculos
Route::get('/vehiculos', 'VehiculosController@index')->name('vehiculos');
Route::get('/vehiculos/create', 'VehiculosController@create')->name('vehiculos')->middleware('auth');
Route::get('/vehiculos/create/{id}', 'VehiculosController@datosCliente')->name('vehiculos')->middleware('auth');
Route::post('/vehiculos', 'VehiculosController@store')->name('vehiculos');
Route::patch('/vehiculos/{id}', 'VehiculosController@update')->name('vehiculos');
Route::get('/vehiculos/{id}/edit', 'VehiculosController@edit')->name('vehiculos');
Route::get('/vehiculos-empresas', 'VehiculosController@indexCompany')->name('vehiculos');


//Reportes
Route::get('/pdf', 'ReportesController@generar');
