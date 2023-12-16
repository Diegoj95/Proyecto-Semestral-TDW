<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodegasModel extends Model
{
    use HasFactory;

    protected $table='bodegas';

    protected $fillable = [
        'nombre_bodega',
        'direccion_bodega',
    ];

    public function traspasosOrigen(){
        return $this->hasMany(Traspasos::class, 'id_bodega_origen');
    }

    public function traspasosDestino(){
        return $this->hasMany(Traspasos::class, 'id_bodega_destino');
    }

}
