<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductoRepository;
use App\Http\Requests\ProductoRequest;

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
}
