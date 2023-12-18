<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IngresosRepository;
use App\Http\Requests\IngresosRequest;

class IngresosController extends Controller
{
    protected IngresosRepository $ingresosRepository;

    public function __construct(ingresosRepository $ingresosRepository)
    {
        $this->ingresosRepository = $ingresosRepository;
    }

    public function RegistrarIngreso(IngresosRequest $request)
    {
        return $this->ingresosRepository->RegistrarIngreso($request);
    }

    public function ListarAllIngresos(Request $request)
    {
        return $this->ingresosRepository->ListarAllIngresos($request);
    }

    public function ListarUnIngreso(Request $request)
    {
        return $this->ingresosRepository->ListarUnIngreso($request);
    }

    public function ActualizarIngreso(IngresosRequest $request)
    {
        return $this->ingresosRepository->ActualizarIngreso($request);
    }

    public function EliminarIngreso(Request $request)
    {
        return $this->ingresosRepository->EliminarIngreso($request);
    }
}
