<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EgresosRepository;
use App\Http\Requests\EgresosRequest;

class EgresosController extends Controller
{
    protected EgresosRepository $egresosRepository;

    public function __construct(egresosRepository $egresosRepository)
    {
        $this->egresosRepository = $egresosRepository;
    }

    public function RegistrarEgreso(EgresosRequest $request)
    {
        return $this->egresosRepository->RegistrarEgreso($request);
    }

    public function ListarAllEgresos(Request $request)
    {
        return $this->egresosRepository->ListarAllEgresos($request);
    }

    public function ListarUnEgreso(Request $request)
    {
        return $this->egresosRepository->ListarUnEgreso($request);
    }

    public function ActualizarEgreso(EgresosRequest $request)
    {
        return $this->egresosRepository->ActualizarEgreso($request);
    }

    public function EliminarEgreso(Request $request)
    {
        return $this->egresosRepository->EliminarEgreso($request);
    }

    
}
