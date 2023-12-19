<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\EgresosModel;
use App\Models\DetalleEgresosModel;
use App\Models\InventarioBodegasModel;
use App\Models\ProductoModel;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class EgresosRepository
{
    public function RegistrarEgreso($request)
    {
        DB::beginTransaction();
        try {
            // Registrar el egreso
            $egreso = new EgresosModel();
            $egreso->id_bodega = $request->id_bodega;
            $egreso->save();
    
            foreach ($request->productos as $producto) {
                // Registrar cada detalle del egreso
                $detalleEgreso = new DetalleEgresosModel();
                $detalleEgreso->id_egreso = $egreso->id;
                $detalleEgreso->id_producto = $producto['id'];

                // Valida que el producto exista
                $productoExistente = ProductoModel::find($producto['id']);
                if (!$productoExistente) {
                    throw new Exception("El producto con ID {$producto['id']} no existe.");
                }
                $detalleEgreso->cantidad = $producto['cantidad'];
                $detalleEgreso->save();
    
                // Actualizar inventario en bodega
                $inventario = InventarioBodegasModel::where('id_bodega', $egreso->id_bodega)
                                ->where('id_producto', $producto['id'])
                                ->first();
    
                if ($inventario && $inventario->cantidad_producto >= $producto['cantidad']) {
                    $inventario->cantidad_producto -= $producto['cantidad'];
                    $inventario->save();
                } else {
                    throw new Exception("Stock insuficiente para el producto ID: " . $producto['id']);
                }
            }
    
            DB::commit();
            return response()->json(["egreso" => $egreso], Response::HTTP_OK);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListarAllEgresos($request)
    {
        try{
            $egresos = EgresosModel::all();
            return response()->json(["egresos" => $egresos], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListarUnEgreso($request)
    {
        try{
            $egreso = EgresosModel::find($request->id);
            return response()->json(["egreso" => $egreso], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ActualizarEgreso($request)
    {
        try{
            $egreso = EgresosModel::find($request->id);
            if(!$egreso){
                return response()->json(["message" => "No se encontró el egreso"], Response::HTTP_BAD_REQUEST);
            }

            if($request->has('id_bodega')){
                $egreso->id_bodega = $request->id_bodega;
            }
            $egreso->save();
            return response()->json(["egreso" => $egreso], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function EliminarEgreso($request)
    {
        try{
            $egreso = EgresosModel::find($request->id);
            if(!$egreso){
                return response()->json(["message" => "No se encontró el egreso"], Response::HTTP_BAD_REQUEST);
            }
            $egreso->delete();
            return response()->json(["egreso" => $egreso], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }

    }
}