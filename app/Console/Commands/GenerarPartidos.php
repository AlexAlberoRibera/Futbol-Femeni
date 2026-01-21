<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Equipo;
use App\Models\Partido;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GenerarPartidos extends Command
{
    protected $signature = 'partidos:generar {--truncate : Truncar tabla partidos antes de generar} {--start-date= : Fecha inicial YYYY-MM-DD}';
    protected $description = 'Genera automáticamente partidos ida y vuelta entre equipos y asigna árbitros';

    public function handle()
    {
        $equipos = Equipo::all();
        $arbitros = User::where('role', User::ROLE_ARBITRE)->get();

        if ($equipos->count() < 2) {
            $this->error('Se necesitan al menos 2 equipos para generar partidos.');
            return 1;
        }

        if ($arbitros->isEmpty()) {
            $this->error('No se encontró ningún árbitro (role = "arbitro").');
            return 1;
        }

        if ($this->option('truncate')) {
            DB::table('partidos')->truncate();
            $this->info('Tabla `partidos` truncada.');
        }

        // Fecha inicial: usar --start-date si se proporciona, si no usar mañana
        if ($this->option('start-date')) {
            try {
                $fecha = Carbon::parse($this->option('start-date'));
            } catch (\Exception $e) {
                $this->error('Formato de fecha inválido. Usa YYYY-MM-DD.');
                return 1;
            }
        } else {
            $fecha = Carbon::now()->addDays(1);
        }
        $contador = 0;
        $creados = 0;

        // Generar calendario: cada equipo contra todos (ida y vuelta)
        for ($i = 0; $i < $equipos->count(); $i++) {
            for ($j = $i + 1; $j < $equipos->count(); $j++) {
                // Evitar crear duplicados exactos por si ya existen
                $exists = Partido::where('local_id', $equipos[$i]->id)
                    ->where('visitante_id', $equipos[$j]->id)
                    ->exists();

                if (! $exists) {
                    Partido::create([
                        'local_id' => $equipos[$i]->id,
                        'visitante_id' => $equipos[$j]->id,
                        'fecha' => $fecha->copy()->addDays($contador),
                        'arbitro_id' => $arbitros->random()->id,
                        'resultado' => null,
                    ]);
                    $creados++;
                }

                $contador++;

                $exists2 = Partido::where('local_id', $equipos[$j]->id)
                    ->where('visitante_id', $equipos[$i]->id)
                    ->exists();

                if (! $exists2) {
                    Partido::create([
                        'local_id' => $equipos[$j]->id,
                        'visitante_id' => $equipos[$i]->id,
                        'fecha' => $fecha->copy()->addDays($contador),
                        'arbitro_id' => $arbitros->random()->id,
                        'resultado' => null,
                    ]);
                    $creados++;
                }

                $contador++;
            }
        }

        $this->info("Partidos generados: {$creados}");

        return 0;
    }
}
