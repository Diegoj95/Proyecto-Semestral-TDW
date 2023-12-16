<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleTraspasosModel extends Model
{
    use HasFactory;

    protected $table='detalle_traspasos';

    protected $fillable = [
        'id_traspaso',
        'id_producto',
        'cantidad',
    ];

    public function traspaso(){
        return $this->belongsTo(Traspasos::class, 'id_traspaso');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
