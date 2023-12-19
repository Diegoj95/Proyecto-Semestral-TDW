<?php
namespace App\Repositories;

use App\Models\ProductoModel;
use App\Models\InventarioBodegasModel;
use App\Models\BodegasModel;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;


class ProductoRepository
{
    public function RegistrarProducto($request)
    {
        try {
            $producto = new ProductoModel();
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->url_foto = $request->url_foto;
            $producto->categoria = $request->categoria;
            $producto->save();
            return response()->json(["producto" => $producto], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ProductosBodega(Request $request)
    {
        try {
            // Carga ansiosa de productos junto con su inventario en la bodega específica
            $productos = InventarioBodegasModel::with('producto')
                            ->where('id_bodega', $request->id_bodega)
                            ->get();
    
            return response()->json(["productos" => $productos], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    

    public function ListarAllProductos($request)
    {
        try{
            $productos = ProductoModel::all();
            return response()->json(["productos" => $productos], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListarUnProducto($request)
    {
        try{
            $producto = ProductoModel::find($request->id);
            if(!$producto){
                return response()->json(["message" => "No se encontró el producto"], Response::HTTP_BAD_REQUEST);
            }
            return response()->json(["producto" => $producto], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }

    }

    public function ActualizarProducto($request)
    {
        try{
            $producto = ProductoModel::find($request->id);
            if(!$producto){
                return response()->json(["message" => "No se encontró el producto"], Response::HTTP_BAD_REQUEST);
            }

            if($request->has('nombre')){
                $producto->nombre = $request->nombre;
            }
            if($request->has('descripcion')){
                $producto->descripcion = $request->descripcion;
            }
            if($request->has('precio')){
                $producto->precio = $request->precio;
            }
            if($request->has('url_foto')){
                $producto->url_foto = $request->url_foto;
            }
            if($request->has('categoria')){
                $producto->categoria = $request->categoria;
            }

            $producto->save();
            return response()->json(["producto" => $producto], Response::HTTP_OK);
        }catch(Exception $e){

            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function EliminarProducto($request)
    {
        try{
            $producto = ProductoModel::find($request->id);
            if(!$producto){
                return response()->json(["message" => "No se encontró el producto"], Response::HTTP_BAD_REQUEST);
            }
            $producto->delete();
            return response()->json(["message" => "Producto eliminado"], Response::HTTP_OK);
        }
        catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getInventarioBodegas($id)
    {
        return InventarioBodegas::where('id_producto', $id)->get();
    }


    //Bodegas CRUD
    public function RegistrarBodegas($request)
    {
        try {
            $bodega = new BodegasModel();
            $bodega->nombre_bodega = $request->nombre_bodega;
            $bodega->direccion_bodega = $request->direccion_bodega;
            $bodega->url_imagen_bodega = $request->url_imagen_bodega;
            $bodega->save();
            return response()->json(["bodega" => $bodega], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListarAllBodegas($request)
    {
        try{
            $bodegas = BodegasModel::all();
            return response()->json(["bodegas" => $bodegas], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ListarUnaBodega($request)
    {
        try{
            $bodega = BodegasModel::find($request->id);
            return response()->json(["bodega" => $bodega], Response::HTTP_OK);

        }catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }

    }

    public function ActualizarBodega($request)
    {
        try{
            $bodega = BodegasModel::find($request->id);
            if(!$bodega){
                return response()->json(["message" => "No se encontró la bodega"], Response::HTTP_BAD_REQUEST);
            }

            if($request->has('nombre_bodega')){
                $bodega->nombre_bodega = $request->nombre_bodega;
            }
            if($request->has('direccion_bodega')){
                $bodega->direccion_bodega = $request->direccion_bodega;
            }

            $bodega->save();
            return response()->json(["bodega" => $bodega], Response::HTTP_OK);
        }catch(Exception $e){

            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function EliminarBodega($request)
    {
        try{
            $bodega = BodegasModel::find($request->id);
            if(!$bodega){
                return response()->json(["message" => "No se encontró la bodega"], Response::HTTP_BAD_REQUEST);
            }
            $bodega->delete();
            return response()->json(["message" => "Bodega eliminada"], Response::HTTP_OK);
        }
        catch(Exception $e){
            return response()->json([
                "error" => $e->getMessage(),
                "line" => $e->getLine(),
                "file" => $e->getFile(),
                "metodo" => __METHOD__
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}

