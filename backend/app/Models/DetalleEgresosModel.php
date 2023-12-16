<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEgresos extends Model
{
    use HasFactory;

    protected $table='detalle_egresos';

    protected $fillable = [
        'id_egreso',
        'id_producto',
        'cantidad',
    ];

    public function egreso(){
        return $this->belongsTo(Egresos::class, 'id_egreso');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }

}
