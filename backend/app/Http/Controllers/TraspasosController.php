<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TraspasosRepository;
use App\Http\Requests\TraspasosRequest;

class TraspasosController extends Controller
{
    protected TraspasosRepository $traspasosRepository;

    public function __construct(traspasosRepository $traspasosRepository)
    {
        $this->traspasosRepository = $traspasosRepository;
    }

    public function RegistrarTraspaso(TraspasosRequest $request)
    {
        return $this->traspasosRepository->RegistrarTraspaso($request);
    }

    public function ListarAllTraspasos(Request $request)
    {
        return $this->traspasosRepository->ListarAllTraspasos($request);
    }

    public function ListarUnTraspaso(Request $request)
    {
        return $this->traspasosRepository->ListarUnTraspaso($request);
    }

    public function ActualizarTraspaso(TraspasosRequest $request)
    {
        return $this->traspasosRepository->ActualizarTraspaso($request);
    }

    public function EliminarTraspaso(Request $request)
    {
        return $this->traspasosRepository->EliminarTraspaso($request);
    }
}
