<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Poké Ball',
                'descripcion' => 'Una herramienta estándar para capturar Pokémon.',
                'precio' => 200,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Super Ball',
                'descripcion' => 'Tiene un índice de éxito mayor que la Poké Ball para capturar Pokémon.',
                'precio' => 600,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Ultra Ball',
                'descripcion' => 'Ofrece altas tasas de éxito para capturar Pokémon, superior a la Super Ball.',
                'precio' => 1200,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Buceo Ball',
                'descripcion' => 'Especialmente efectiva para capturar Pokémon que viven bajo el agua.',
                'precio' => 1000,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Crono Ball',
                'descripcion' => 'Su efectividad aumenta conforme pasan más turnos en el combate.',
                'precio' => 1000,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Honor Ball',
                'descripcion' => 'Idéntica en efectividad a la Poké Ball, pero usada como bonificación en ciertas compras.',
                'precio' => 200,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Lujo Ball',
                'descripcion' => 'Hace que el Pokémon capturado se apegue más rápidamente a su entrenador.',
                'precio' => 1000,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Malla Ball',
                'descripcion' => 'Mejor para capturar Pokémon de tipo bicho y agua.',
                'precio' => 1000,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Master Ball',
                'descripcion' => 'Puede capturar cualquier Pokémon sin fallar, extremadamente rara y valiosa.',
                'precio' => 9999,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Nido Ball',
                'descripcion' => 'Más efectiva cuando se usa en Pokémon de niveles bajos.',
                'precio' => 1000,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Repetir Ball',
                'descripcion' => 'Aumenta la posibilidad de capturar especies de Pokémon previamente capturados.',
                'precio' => 1000,
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Poción',
                'descripcion' => 'Restaura una pequeña cantidad de puntos de salud de un Pokémon.',
                'precio' => 300,
                'categoria' => 'Pociones',
            ],
            [
                'nombre' => 'Superpoción',
                'descripcion' => 'Restaura más salud que la Poción común.',
                'precio' => 700,
                'categoria' => 'Pociones',
            ],
            [
                'nombre' => 'Hiperpoción',
                'descripcion' => 'Restaura aún más salud que la Superpoción.',
                'precio' => 1200,
                'categoria' => 'Pociones',
            ],
            [
                'nombre' => 'Max Poción',
                'descripcion' => 'Restaura toda la salud de un Pokémon.',
                'precio' => 2500,
                'categoria' => 'Pociones',
            ],
            [
                'nombre' => 'Repelente',
                'descripcion' => 'Evita encuentros con Pokémon salvajes de bajo nivel por un tiempo.',
                'precio' => 350,
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Super Repelente',
                'descripcion' => 'Versión más efectiva del repelente común.',
                'precio' => 500,
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Max Repelente',
                'descripcion' => 'El repelente más efectivo, evita encuentros con Pokémon salvajes durante más tiempo.',
                'precio' => 700,
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Revivir',
                'descripcion' => 'Resucita a un Pokémon desmayado y restaura la mitad de su salud máxima.',
                'precio' => 1500,
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Piedra Agua',
                'descripcion' => 'Objeto evolutivo que transforma ciertos tipos de Pokémon.',
                'precio' => 2100,
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Piedra Fuego',
                'descripcion' => 'Objeto evolutivo que transforma ciertos tipos de Pokémon.',
                'precio' => 2100,
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Piedra Hoja',
                'descripcion' => 'Objeto evolutivo que transforma ciertos tipos de Pokémon.',
                'precio' => 2100,
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Piedra Trueno',
                'descripcion' => 'Objeto evolutivo que transforma ciertos tipos de Pokémon.',
                'precio' => 2100,
                'categoria' => 'Otros',
            ],
        ];

        foreach ($productos as $producto) {
            DB::table('productos')->insert($producto);
        }
    }
}
