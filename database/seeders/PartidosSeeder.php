<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partido;
use App\Models\Equipo;

class PartidosSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener equipos por nombre
        $barca = equipo::where('nombre', 'Barça Femení')->first();
        $atleti = equipo::where('nombre', 'Atlètic de Madrid')->first();
        $real = equipo::where('nombre', 'Real Madrid Femení')->first();

        // Crear partidos manuales
        if ($barca && $atleti) {
            Partido::create([
                'local_id' => $barca->id,
                'visitante_id' => $atleti->id,
                'fecha' => '2024-11-30',
                'resultado' => '2-1',
            ]);
        }

        if ($real && $barca) {
            Partido::create([
                'local_id' => $real->id,
                'visitante_id' => $barca->id,
                'fecha' => '2024-12-15',
                'resultado' => '0-3',
            ]);
        }

        if ($atleti && $real) {
            Partido::create([
                'local_id' => $atleti->id,
                'visitante_id' => $real->id,
                'fecha' => '2025-01-10',
                'resultado' => null, // partido aún no jugado
            ]);
        }
    }
}
