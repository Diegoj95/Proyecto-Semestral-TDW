<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    use HasFactory;

    protected $table='productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'url_foto',
        'categoria',
    ];

    public function detalle_ingresos(){
        return $this->hasMany(DetalleIngreso::class, 'id_producto');
    }

    public function detalle_egresos(){
        return $this->hasMany(DetalleEgreso::class, 'id_producto');
    }

    public function detalle_traspasos(){
        return $this->hasMany(DetalleTraspaso::class, 'id_producto');
    }

    public function inventarios() {
        return $this->hasMany(InventarioBodega::class, 'id_producto');
    }
}
