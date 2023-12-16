<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::post('registrar_producto', [ProductosController::class, 'RegistrarProducto']);
Route::get('listar_all_productos', [ProductosController::class, 'ListarAllProductos']);
Route::get('listar_un_producto', [ProductosController::class, 'ListarUnProducto']);
Route::put('actualizar_producto', [ProductosController::class, 'ActualizarProducto']);
Route::delete('eliminar_producto', [ProductosController::class, 'EliminarProducto']);


