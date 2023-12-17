<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedoresModel extends Model
{
    use HasFactory;

    protected $table='proveedores';

    protected $fillable = [
        'nombre_proveedor',
        'telefono',
        'direccion_proveedor',
    ];

    public function ingresos(){
        return $this->hasMany(Ingresos::class, 'id_proveedor');
    }


}
