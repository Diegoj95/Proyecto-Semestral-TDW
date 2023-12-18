<?php
namespace App\Repositories;

use App\Models\EgresosModel;
use App\Models\DetalleEgresoModel;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class EgresosRepository
{
    public function RegistrarEgreso($request)
    {
        try {
            $egreso = new EgresosModel();
            $egreso->fecha_egreso = $request->fecha_egreso;
            $egreso->id_bodega = $request->id_bodega;
            $egreso->save();
            return response()->json(["egreso" => $egreso], Response::HTTP_OK);
        } catch (Exception $e) {
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
            if($request->has('fecha_egreso')){
                $egreso->fecha_egreso = $request->fecha_egreso;
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