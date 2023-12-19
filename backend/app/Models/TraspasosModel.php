<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraspasosModel extends Model
{
    use HasFactory;

    protected $table='traspasos';

    protected $fillable = [
        'id_bodega_origen',
        'id_bodega_destino',
    ];

    public function bodega_origen(){
        return $this->belongsTo(Bodega::class, 'id_bodega_origen');
    }

    public function bodega_destino(){
        return $this->belongsTo(Bodega::class, 'id_bodega_destino');
    }

    public function detalle_traspasos(){
        return $this->hasMany(DetalleTraspaso::class, 'id_traspaso');
    }
}
