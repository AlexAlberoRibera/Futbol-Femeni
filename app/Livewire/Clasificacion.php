<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Equipo;
use App\Models\Partido;

class Clasificacion extends Component
{
    public $equipos;

    public function mount()
    {
        $this->calcularClasificacion();
    }

    public function calcularClasificacion()
    {
        $equipos = Equipo::all();

        // Inicializamos los stats
        foreach ($equipos as $equipo) {
            $equipo->puntos = 0;
            $equipo->gf = 0;
            $equipo->gc = 0;
            $equipo->dif = 0;
        }

        $partidos = Partido::all();

        foreach ($partidos as $partido) {
            $local = $partido->local;
            $visitante = $partido->visitante;

            // Saltar si no hay resultado
            if (is_null($partido->resultado)) continue;

            // Separar resultado: "2-1"
            [$golesLocal, $golesVisitante] = explode('-', $partido->resultado);

            $local->gf += (int)$golesLocal;
            $local->gc += (int)$golesVisitante;
            $local->dif = $local->gf - $local->gc;

            $visitante->gf += (int)$golesVisitante;
            $visitante->gc += (int)$golesLocal;
            $visitante->dif = $visitante->gf - $visitante->gc;

            // Puntos
            if ((int)$golesLocal > (int)$golesVisitante) {
                $local->puntos += 3;
            } elseif ((int)$golesLocal < (int)$golesVisitante) {
                $visitante->puntos += 3;
            } else {
                $local->puntos += 1;
                $visitante->puntos += 1;
            }
        }

        // Ordenar por puntos y diferencia
        $this->equipos = $equipos->sortByDesc(function ($equipo) {
            return [$equipo->puntos, $equipo->dif];
        });
    }

    public function render()
    {
        return view('livewire.clasificacion', [
            'equipos' => $this->equipos
        ]);
    }
}
