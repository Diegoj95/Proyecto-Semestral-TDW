<?php
namespace App\Repositories;

use App\Models\TraspasosModel;
use App\Models\InventarioBodegas;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class TraspasosRepository
{
    public function RegistrarTraspaso($request)
    {
        try {
            $traspaso = new TraspasosModel();
            $traspaso->fecha_traspaso = $request->fecha_traspaso;
            $traspaso->id_bodega_origen = $request->id_bodega_origen;
            $traspaso->id_bodega_destino = $request->id_bodega_destino;
            $traspaso->save();
            return response()->json(["traspaso" => $traspaso], Response::HTTP_OK);
        } catch (Exception $e) {
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
            if($request->has('fecha_traspaso')){
                $traspaso->fecha_traspaso = $request->fecha_traspaso;
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