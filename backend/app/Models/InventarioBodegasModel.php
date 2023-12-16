<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioBodegas extends Model
{
    use HasFactory;

    protected $table='inventario_bodegas';

    protected $fillable = [
        'id_bodega',
        'id_producto',
        'cantidad_producto',
    ];

    public function bodega(){
        return $this->belongsTo(Bodegas::class, 'id_bodega');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }

}
