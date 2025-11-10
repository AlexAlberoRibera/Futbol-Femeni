<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Estadio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estadio = Estadio::where('nombre', 'Campo Nuevo')->first();
        $estadio->equipos()->create([
            'nombre' => 'Barça Femení',
            'titulos' => 30,
        ]);
        $estadio = Estadio::where('nombre', 'Wanda Metropolitano')->first();
        $estadio->equipos()->create([
            'nombre' => 'Atlètic de Madrid',
            'titulos' => 10,
        ]);
        $estadio = Estadio::where('nombre', 'Santiago Bernabéu')->first();
        $estadio->equipos()->create([
            'nombre' => 'Real Madrid Femení',
            'titulos' => 5,
        ]);
        Equipo::factory()->count(10)->create();
    }
}