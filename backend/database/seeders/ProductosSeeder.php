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
                'url_foto' => 'https://i.imgur.com/QfSkBl6.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Super Ball',
                'descripcion' => 'Tiene un índice de éxito mayor que la Poké Ball para capturar Pokémon.',
                'precio' => 600,
                'url_foto' => 'https://i.imgur.com/flH64hc.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Ultra Ball',
                'descripcion' => 'Ofrece altas tasas de éxito para capturar Pokémon, superior a la Super Ball.',
                'precio' => 1200,
                'url_foto' => 'https://i.imgur.com/bePWNJG.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Buceo Ball',
                'descripcion' => 'Especialmente efectiva para capturar Pokémon que viven bajo el agua.',
                'precio' => 1000,
                'url_foto' => 'https://i.imgur.com/HGer2UW.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Crono Ball',
                'descripcion' => 'Su efectividad aumenta conforme pasan más turnos en el combate.',
                'precio' => 1000,
                'url_foto' => 'https://i.imgur.com/frXrxD5.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Honor Ball',
                'descripcion' => 'Idéntica en efectividad a la Poké Ball, pero usada como bonificación en ciertas compras.',
                'precio' => 200,
                'url_foto' => 'https://i.imgur.com/XIWwKOD.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Lujo Ball',
                'descripcion' => 'Hace que el Pokémon capturado se apegue más rápidamente a su entrenador.',
                'precio' => 1000,
                'url_foto' => 'https://i.imgur.com/coET2Bk.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Malla Ball',
                'descripcion' => 'Mejor para capturar Pokémon de tipo bicho y agua.',
                'precio' => 1000,
                'url_foto' => 'https://i.imgur.com/aqIAZRf.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Master Ball',
                'descripcion' => 'Puede capturar cualquier Pokémon sin fallar, extremadamente rara y valiosa.',
                'precio' => 9999,
                'url_foto' => 'https://i.imgur.com/pXTAnpY.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Nido Ball',
                'descripcion' => 'Más efectiva cuando se usa en Pokémon de niveles bajos.',
                'precio' => 1000,
                'url_foto' => 'https://i.imgur.com/FslncTw.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Repetir Ball',
                'descripcion' => 'Aumenta la posibilidad de capturar especies de Pokémon previamente capturados.',
                'precio' => 1000,
                'url_foto' => 'https://i.imgur.com/T9axPgo.png',
                'categoria' => 'Pokebolas',
            ],
            [
                'nombre' => 'Poción',
                'descripcion' => 'Restaura una pequeña cantidad de puntos de salud de un Pokémon.',
                'precio' => 300,
                'url_foto' => 'https://i.imgur.com/78TSTiN.png',
                'categoria' => 'Pociones',
            ],
            [
                'nombre' => 'Superpoción',
                'descripcion' => 'Restaura más salud que la Poción común.',
                'precio' => 700,
                'url_foto' => 'https://i.imgur.com/O7y5tIW.png',
                'categoria' => 'Pociones',
            ],
            [
                'nombre' => 'Hiperpoción',
                'descripcion' => 'Restaura aún más salud que la Superpoción.',
                'precio' => 1200,
                'url_foto' => 'https://i.imgur.com/HyXsneK.png',
                'categoria' => 'Pociones',
            ],
            [
                'nombre' => 'Max Poción',
                'descripcion' => 'Restaura toda la salud de un Pokémon.',
                'precio' => 2500,
                'url_foto' => 'https://i.imgur.com/d5hNtRB.png',
                'categoria' => 'Pociones',
            ],
            [
                'nombre' => 'Repelente',
                'descripcion' => 'Evita encuentros con Pokémon salvajes de bajo nivel por un tiempo.',
                'precio' => 350,
                'url_foto' => 'https://i.imgur.com/il9kUI5.png',
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Super Repelente',
                'descripcion' => 'Versión más efectiva del repelente común.',
                'precio' => 500,
                'url_foto' => 'https://i.imgur.com/3JELX80.png',
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Max Repelente',
                'descripcion' => 'El repelente más efectivo, evita encuentros con Pokémon salvajes durante más tiempo.',
                'precio' => 700,
                'url_foto' => 'https://i.imgur.com/il9kUI5.png',
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Revivir',
                'descripcion' => 'Resucita a un Pokémon desmayado y restaura la mitad de su salud máxima.',
                'precio' => 1500,
                'url_foto' => 'https://i.imgur.com/Fr12lmR.png',
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Piedra Agua',
                'descripcion' => 'Objeto evolutivo que transforma ciertos tipos de Pokémon.',
                'precio' => 2100,
                'url_foto' => 'https://i.imgur.com/C2hBkCl.png',
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Piedra Fuego',
                'descripcion' => 'Objeto evolutivo que transforma ciertos tipos de Pokémon.',
                'precio' => 2100,
                'url_foto' => 'https://i.imgur.com/oEwFsea.png',
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Piedra Hoja',
                'descripcion' => 'Objeto evolutivo que transforma ciertos tipos de Pokémon.',
                'precio' => 2100,
                'url_foto' => 'https://i.imgur.com/TetFlrX.png',
                'categoria' => 'Otros',
            ],
            [
                'nombre' => 'Piedra Trueno',
                'descripcion' => 'Objeto evolutivo que transforma ciertos tipos de Pokémon.',
                'precio' => 2100,
                'url_foto' => 'https://i.imgur.com/GTUxHUY.png',
                'categoria' => 'Otros',
            ],
        ];

        foreach ($productos as $producto) {
            DB::table('productos')->insert($producto);
        }
    }
}
