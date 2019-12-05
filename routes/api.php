<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('almacenes', 'AlmacenController');
Route::resource('articulos', 'ArticuloController');
Route::resource('tiposInventario', 'TipoInventarioController');
Route::resource('tiposTransaccion', 'TipoTransaccionController');
Route::resource('asientosContables', 'AsientoContableController');
Route::resource('transacciones', 'TransaccionController');
