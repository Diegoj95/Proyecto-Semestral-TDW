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
        'id_bodega',

    ];

    public function bodega(){
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }
}
