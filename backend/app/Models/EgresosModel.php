<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EgresosModel extends Model
{
    use HasFactory;

    protected $table='egresos';

    protected $fillable = [
        'fecha_egreso',
        'id_bodega',
    ];

    public function bodega(){
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }

    public function detalle_egresos(){
        return $this->hasMany(DetalleEgreso::class, 'id_egreso');
    }

}
