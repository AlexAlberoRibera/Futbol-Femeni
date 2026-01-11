<?php

namespace App\View\Components;

use Illuminate\View\Component;

class equipo extends Component
{
    public $nombre; // Variable que recibirá el nombre del equipo

    /**
     * Crear una nueva instancia del componente
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Obtener la vista del componente
     */
    public function render()
    {
        return view('componentes.equipo');
    }
}
