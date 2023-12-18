<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class BodegaRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'id' => 'integer|nullable|exists:bodegas,id',
            'nombre_bodega' => 'required|string|unique:bodegas,nombre_bodega',
            'direccion_bodega' => 'required|string',
            'url_imagen_bodega' => 'required|string',
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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }
}
