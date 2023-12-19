<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\TraspasosController;
use App\Http\Controllers\EgresosController;

//Api de productos
Route::post('registrar_producto', [ProductosController::class, 'RegistrarProducto']);
Route::get('listar_all_productos', [ProductosController::class, 'ListarAllProductos']);
Route::get('listar_un_producto', [ProductosController::class, 'ListarUnProducto']);
Route::put('actualizar_producto', [ProductosController::class, 'ActualizarProducto']);
Route::delete('eliminar_producto', [ProductosController::class, 'EliminarProducto']);
Route::get('productos_bodega', [ProductosController::class, 'ProductosBodega']);

//Api de ingresos
Route::post('registrar_ingreso', [IngresosController::class, 'RegistrarIngreso']);
Route::get('listar_all_ingresos', [IngresosController::class, 'ListarAllIngresos']);
Route::get('listar_un_ingreso', [IngresosController::class, 'ListarUnIngreso']);
Route::put('actualizar_ingreso', [IngresosController::class, 'ActualizarIngreso']);
Route::delete('eliminar_ingreso', [IngresosController::class, 'EliminarIngreso']);

//Api de traspasos
Route::post('registrar_traspaso', [TraspasosController::class, 'RegistrarTraspaso']);
Route::get('listar_all_traspasos', [TraspasosController::class, 'ListarAllTraspasos']);
Route::get('listar_un_traspaso', [TraspasosController::class, 'ListarUnTraspaso']);
Route::put('actualizar_traspaso', [TraspasosController::class, 'ActualizarTraspaso']);
Route::delete('eliminar_traspaso', [TraspasosController::class, 'EliminarTraspaso']);

//Api de bodegas
Route::post('registrar_bodega', [ProductosController::class, 'RegistrarBodegas']);
Route::get('listar_all_bodegas', [ProductosController::class, 'ListarAllBodegas']);
Route::get('listar_una_bodega', [ProductosController::class, 'ListarUnaBodega']);
Route::put('actualizar_bodega', [ProductosController::class, 'ActualizarBodega']);
Route::delete('eliminar_bodega', [ProductosController::class, 'EliminarBodega']);

//Api de egresos
Route::post('registrar_egreso', [EgresosController::class, 'RegistrarEgreso']);
Route::get('listar_all_egresos', [EgresosController::class, 'ListarAllEgresos']);
Route::get('listar_un_egreso', [EgresosController::class, 'ListarUnEgreso']);
Route::put('actualizar_egreso', [EgresosController::class, 'ActualizarEgreso']);
Route::delete('eliminar_egreso', [EgresosController::class, 'EliminarEgreso']);
