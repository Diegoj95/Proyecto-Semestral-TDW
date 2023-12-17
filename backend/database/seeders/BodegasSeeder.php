<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodegasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodegas = [
            [
                'nombre_bodega' => 'Bodega Plateada',
                'direccion_bodega' => 'Kanto',
            ],
            [
                'nombre_bodega' => 'Bodega Celeste',
                'direccion_bodega' => 'Kanto',
            ],
            [
                'nombre_bodega' => 'Bodega Carmín',
                'direccion_bodega' => 'Kanto',
            ],
            [
                'nombre_bodega' => 'Bodega Azulona',
                'direccion_bodega' => 'Kanto',
            ],
            [
                'nombre_bodega' => 'Bodega Fucsia',
                'direccion_bodega' => 'Kanto',
            ],
            [
                'nombre_bodega' => 'Bodega Azafrán',
                'direccion_bodega' => 'Kanto',
            ],
            [
                'nombre_bodega' => 'Bodega Canela',
                'direccion_bodega' => 'Kanto',
            ],
            [
                'nombre_bodega' => 'Bodega Verde',
                'direccion_bodega' => 'Kanto',
            ],
        ];

        foreach ($bodegas as $bodega) {
            DB::table('bodegas')->insert($bodega);
        }
    }
}
