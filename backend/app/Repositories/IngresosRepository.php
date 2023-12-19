<?php
namespace App\Repositories;

use App\Models\IngresosModel;
use App\Models\DetalleIngresosModel;
use App\Models\InventarioBodegasModel;
use App\Models\BodegasModel;
use App\Models\ProductoModel;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class IngresosRepository
{
    public function RegistrarIngreso($request)
    {
        DB::beginTransaction();
        try {
            // Registrar el ingreso
            $ingreso = new IngresosModel();
            $ingreso->id_bodega = $request->id_bodega;
            $ingreso->save();
    
            foreach ($request->productos as $producto) {
                // Registrar cada detalle del ingreso
                $detalleIngreso = new DetalleIngresosModel();
                $detalleIngreso->id_ingreso = $ingreso->id;
                $detalleIngreso->id_producto = $producto['id'];
                $detalleIngreso->cantidad = $producto['cantidad'];
                $detalleIngreso->save();
    
                // Actualizar o insertar en inventario de bodegas
                $inventario = InventarioBodegasModel::firstOrCreate(
                    ['id_bodega' => $ingreso->id_bodega, 'id_producto' => $producto['id']],
                    ['cantidad_producto' => 0]
                );
    
                $inventario->cantidad_producto += $producto['cantidad'];
                $inventario->save();
            }
    
            DB::commit();
            return response()->json(["ingreso" => $ingreso], Response::HTTP_OK);
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

    public function ListarAllIngresos($request)
    {
        try{
            $ingresos = IngresosModel::all();
            return response()->json(["ingresos" => $ingresos], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListarUnIngreso($request)
    {
        try{
            $ingreso = IngresosModel::find($request->id);
            return response()->json(["ingreso" => $ingreso], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ActualizarIngreso($request)
    {
        try{
            $ingreso = IngresosModel::find($request->id);
            if(!$ingreso){
                return response()->json(["message" => "No se encontró el ingreso"], Response::HTTP_BAD_REQUEST);
            }
            if($request->has('fecha_ingreso')){
                $ingreso->fecha_ingreso = $request->fecha_ingreso;
            }
            if($request->has('id_bodega')){
                $ingreso->id_bodega = $request->id_bodega;
            }
            $ingreso->save();
            return response()->json(["ingreso" => $ingreso], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function EliminarIngreso($request)
    {
        try{
            $ingreso = IngresosModel::find($request->id);
            if(!$ingreso){
                return response()->json(["message" => "No se encontró el ingreso"], Response::HTTP_BAD_REQUEST);
            }
            $ingreso->delete();
            return response()->json(["ingreso" => $ingreso], Response::HTTP_OK);

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