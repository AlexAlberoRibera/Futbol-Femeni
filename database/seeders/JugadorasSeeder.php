<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jugadora;
use App\Models\Equipo;

class JugadorasSeeder extends Seeder
{
    public function run(): void
    {
        // Ejemplo de jugadoras para equipos existentes
        $barca = equipo::where('nombre', 'Barça Femení')->first();
        $atleti = equipo::where('nombre', 'Atlètic de Madrid')->first();
        $real = equipo::where('nombre', 'Real Madrid Femení')->first();

        Jugadora::create([
            'nombre' => 'Sandra Paños',
            'equipo_id' => $barca->id,
            'posicion' => 'Portera',
            'foto' => null,

        ]);

        Jugadora::create([
            'nombre' => 'Alexia Putellas',
            'equipo_id' => $barca->id,
            'posicion' => 'Mediocampista',
            'foto' => null,
        ]);

        Jugadora::create([
            'nombre' => 'Laia Aleixandri',
            'equipo_id' => $atleti->id,
            'posicion' => 'Defensa',
            'foto' => null,
        ]);

        Jugadora::create([
            'nombre' => 'Maite Oroz',
            'equipo_id' => $atleti->id,
            'posicion' => 'Mediocampista',
            'foto' => null,
        ]);

        Jugadora::create([
            'nombre' => 'Claudia Zornoza',
            'equipo_id' => $real->id,
            'posicion' => 'Mediocampista',
            'foto' => null,
        ]);

        Jugadora::create([
            'nombre' => 'Maite Albarrán',
            'equipo_id' => $real->id,
            'posicion' => 'Delantera',
            'foto' => null,
        ]);

        // También puedes crear más con factories si las tienes
        // Jugadora::factory()->count(10)->create();
    }
}
