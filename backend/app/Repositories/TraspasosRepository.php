<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\TraspasosModel;
use App\Models\DetalleTraspasosModel;
use App\Models\InventarioBodegasModel;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class TraspasosRepository
{
    public function RegistrarTraspaso($request)
    {
        DB::beginTransaction();
        try {
            // Registrar el traspaso
            $traspaso = new TraspasosModel();
            $traspaso->id_bodega_origen = $request->id_bodega_origen;
            $traspaso->id_bodega_destino = $request->id_bodega_destino;
            $traspaso->save();
    
            foreach ($request->productos as $producto) {
                // Registrar cada detalle del traspaso
                $detalleTraspaso = new DetalleTraspasosModel();
                $detalleTraspaso->id_traspaso = $traspaso->id;
                $detalleTraspaso->id_producto = $producto['id'];
                $detalleTraspaso->cantidad = $producto['cantidad'];
                $detalleTraspaso->save();
    
                // Actualizar inventario en bodega origen
                $inventarioOrigen = InventarioBodegasModel::where('id_bodega', $traspaso->id_bodega_origen)
                                  ->where('id_producto', $producto['id'])
                                  ->first();
                $inventarioOrigen->cantidad_producto -= $producto['cantidad'];
                $inventarioOrigen->save();
    
                // Actualizar o insertar en inventario de bodega destino
                $inventarioDestino = InventarioBodegasModel::firstOrCreate(
                    ['id_bodega' => $traspaso->id_bodega_destino, 'id_producto' => $producto['id']],
                    ['cantidad_producto' => 0]
                );
                $inventarioDestino->cantidad_producto += $producto['cantidad'];
                $inventarioDestino->save();
            }
    
            DB::commit();
            return response()->json(["traspaso" => $traspaso], Response::HTTP_OK);
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

    public function ListarAllTraspasos($request)
    {
        try{
            $traspasos = TraspasosModel::all();
            return response()->json(["traspasos" => $traspasos], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListarUnTraspaso($request)
    {
        try{
            $traspaso = TraspasosModel::find($request->id);
            return response()->json(["traspaso" => $traspaso], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ActualizarTraspaso($request)
    {
        try{
            $traspaso = TraspasosModel::find($request->id);
            if(!$traspaso){
                return response()->json(["message" => "No se encontró el traspaso"], Response::HTTP_BAD_REQUEST);
            }
            if($request->has('id_bodega_origen')){
                $traspaso->id_bodega_origen = $request->id_bodega_origen;
            }
            if($request->has('id_bodega_destino')){
                $traspaso->id_bodega_destino = $request->id_bodega_destino;
            }

            $traspaso->save();
            return response()->json(["traspaso" => $traspaso], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function EliminarTraspaso($request)
    {
        try{
            $traspaso = TraspasosModel::find($request->id);
            if(!$traspaso){
                return response()->json(["message" => "No se encontró el traspaso"], Response::HTTP_BAD_REQUEST);
            }
            $traspaso->delete();
            return response()->json(["message" => "Traspaso eliminado"], Response::HTTP_OK);

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