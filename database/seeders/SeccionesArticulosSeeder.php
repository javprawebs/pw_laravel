<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Articulo;
use App\Models\Seccion;

class SeccionesArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secciones = [
            'Sección 1',
            'Sección 2',
            'Sección 3',
        ];

        foreach ($secciones as $seccionNombre) {
            $seccion = Seccion::create(['nombre' => $seccionNombre]);

            for ($i = 1; $i <= 3; $i++) {
                Articulo::create([
                    'nombre' => 'Articulo ' . $i . ' de ' . $seccionNombre,
                    'descripcion' => 'Descripción del Articulo ' . $i . ' de ' . $seccionNombre,
                    'precio' => rand(10, 100),
                    'colores' => json_encode(['Rojo', 'Azul', 'Verde']),
                    'tallas' => json_encode(['S', 'M', 'L']),
                    'imagen' => "images/articulos/1719226875-pajaro.jpg",
                    'seccion_id' => $seccion->id,
                ]);
            }
        }
    }
}
