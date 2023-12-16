<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    use HasFactory;

    protected $table='ingresos';

    protected $fillable = [
        'fecha_ingreso',
        'id_proveedor',
    ];

    public function detalle_ingresos(){
        return $this->hasMany(DetalleIngreso::class, 'id_ingreso');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
}
