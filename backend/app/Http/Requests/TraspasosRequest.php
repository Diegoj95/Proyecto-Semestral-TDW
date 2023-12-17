<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraspasosRequest extends FormRequest
{

    public function rules()
    {
        return [
            'fecha_traspaso' => 'required|date',
            'id_bodega_origen' => 'required|different:id_bodega_destino|exists:bodegas,id',
            'id_bodega_destino' => 'required|different:id_bodega_origen|exists:bodegas,id',
            'id_producto' => 'required',
            'cantidad_producto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'integer' => 'El campo :attribute debe ser un número entero',
            'numeric' => 'El campo :attribute debe ser un número',
            'exists' => 'El :attribute debe existir en nuestro sistema',
            'boolean' => 'El campo :attribute debe ser un valor tipo boolean',
            'required_unless' => 'El campo :attribute es requerido condicionalmente',
            'required_with_all' => 'El campo :attribute es requerido condicionalmente',
            'required_with' => 'El campo :attribute es requerido condicionalmente',
            'required_if' => 'El campo :attribute es requerido condicionalmente',
            'string' => 'El campo : attribute debe ser de tipo string',
            'unique' => 'El campo :attribute debe ser único en nuestro sistema',
            'max' => 'El campo :attribute supera el largo máximo permitido',
            'array' => 'El campo :attribute debe ser de tipo array'
        ];
    }
}
