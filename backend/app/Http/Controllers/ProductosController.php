<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductoRepository;
use App\Http\Requests\ProductoRequest;
use App\Http\Requests\BodegaRequest;

class ProductosController extends Controller
{
    protected ProductoRepository $productoRepository;

    public function __construct(productoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function RegistrarProducto(ProductoRequest $request)
    {
        return $this->productoRepository->RegistrarProducto($request);
    }

    public function ListarAllProductos(Request $request)
    {
        return $this->productoRepository->ListarAllProductos($request);
    }

    public function ListarUnProducto(Request $request)
    {
        return $this->productoRepository->ListarUnProducto($request);
    }

    public function ActualizarProducto(ProductoRequest $request)
    {
        return $this->productoRepository->ActualizarProducto($request);
    }

    public function EliminarProducto(Request $request)
    {
        return $this->productoRepository->EliminarProducto($request);
    }

    //Bodegas
    public function RegistrarBodegas(BodegaRequest $request)
    {
        return $this->productoRepository->RegistrarBodegas($request);
    }

    public function ListarAllBodegas(Request $request)
    {
        return $this->productoRepository->ListarAllBodegas($request);
    }

    public function ListarUnaBodega(Request $request)
    {
        return $this->productoRepository->ListarUnaBodega($request);
    }

    public function ActualizarBodega(BodegaRequest $request)
    {
        return $this->productoRepository->ActualizarBodega($request);
    }

    public function EliminarBodega(Request $request)
    {
        return $this->productoRepository->EliminarBodega($request);
    }

    public function ProductosBodega(Request $request)
    {
        return $this->productoRepository->ProductosBodega($request);
    }

}
