<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Partido;

class HistorialPartidos extends Component
{
    public $partidos;
    public $equipo = '';
    public $fecha = '';

    public function mount() {
        $this->partidos = Partido::with(['local', 'visitante', 'arbitro'])->get();
    }

    public function filtrar() {
        $this->partidos = Partido::with(['local', 'visitante', 'arbitro'])
            ->when($this->equipo, fn($query) => $query->whereHas('local', fn($q) => $q->where('nombre','like',"%{$this->equipo}%"))
                                               ->orWhereHas('visitante', fn($q) => $q->where('nombre','like',"%{$this->equipo}%")))
            ->when($this->fecha, fn($query) => $query->whereDate('fecha', $this->fecha))
            ->get();
    }

    public function render() {
        return view('livewire.historial-partidos', ['partidos' => $this->partidos]);
    }
}
