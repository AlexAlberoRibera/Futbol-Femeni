<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\User;
use Carbon\Carbon;

class PartidosSeeder extends Seeder
{
    public function run(): void
    {
        $equipos = Equipo::all();
        $arbitros = User::where('role', User::ROLE_ARBITRE)->get();

        if ($equipos->count() < 2 || $arbitros->count() === 0) {
            return;
        }

        // Crear partidos de liga (cada equipo juega contra todos)
        $fecha = Carbon::now()->addDay();
        $contador = 0;

        for ($i = 0; $i < $equipos->count(); $i++) {
            for ($j = $i + 1; $j < $equipos->count(); $j++) {
                // Partido de ida
                Partido::create([
                    'local_id' => $equipos[$i]->id,
                    'visitante_id' => $equipos[$j]->id,
                    'fecha' => $fecha->copy()->addDays($contador),
                    'arbitro_id' => $arbitros->random()->id,
                    'resultado' => null,
                ]);

                $contador++;

                // Partido de vuelta
                Partido::create([
                    'local_id' => $equipos[$j]->id,
                    'visitante_id' => $equipos[$i]->id,
                    'fecha' => $fecha->copy()->addDays($contador),
                    'arbitro_id' => $arbitros->random()->id,
                    'resultado' => null,
                ]);

                $contador++;
            }
        }
    }
}
