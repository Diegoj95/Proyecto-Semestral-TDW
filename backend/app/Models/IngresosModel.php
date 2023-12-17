<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresosModel extends Model
{
    use HasFactory;

    protected $table='ingresos';

    protected $fillable = [
        'fecha_ingreso',
        'id_producto',
        'cantidad_ingreso',

    ];

    public function detalle_ingresos(){
        return $this->hasMany(DetalleIngreso::class, 'id_ingreso');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
