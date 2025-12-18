<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Estadio;
use Illuminate\Database\Seeder;

class EquiposSeeder extends Seeder
{
    public function run(): void
    {
        $estadio = Estadio::where('nombre', 'Campo Nuevo')->first();
        if ($estadio) {
            $estadio->equipos()->create([
                'nombre' => 'Barça Femení',
                'titulos' => 30,
            ]);
        }

        $estadio = Estadio::where('nombre', 'Wanda Metropolitano')->first();
        if ($estadio) {
            $estadio->equipos()->create([
                'nombre' => 'Atlètic de Madrid',
                'titulos' => 10,
            ]);
        }

        $estadio = Estadio::where('nombre', 'Santiago Bernabéu')->first();
        if ($estadio) {
            $estadio->equipos()->create([
                'nombre' => 'Real Madrid Femení',
                'titulos' => 5,
            ]);
        }

        // Opcional: crear 10 equipos aleatorios para pruebas
        Equipo::factory()->count(10)->create();
    }
}
