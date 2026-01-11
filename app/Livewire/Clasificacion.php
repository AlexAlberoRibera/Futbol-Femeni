<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Equipo;

class Clasificacion extends Component
{
    public function render()
    {
        $equipos = equipo::with(['partidosComoLocal', 'partidosComoVisitante'])->get();

        return view('livewire.clasificacion', compact('equipos'));
    }
}
