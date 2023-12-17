<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngresosModel extends Model
{
    use HasFactory;

    protected $table='detalle_ingresos';

    protected $fillable = [
        'id_ingreso',
        'id_producto',
        'cantidad',
    ];

    public function ingreso(){
        return $this->belongsTo(Ingresos::class, 'id_ingreso');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }

}
