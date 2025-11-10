<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Estadio extends Component
{
    public $nombre;
    public $ciudad;
    public $capacidad;
    public $equipo_principal;

    /**
     * Crear una nueva instancia del componente.
     */
    public function __construct($nombre, $ciudad, $capacidad, $equipoPrincipal)
    {
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->capacidad = $capacidad;
        $this->equipo_principal = $equipoPrincipal;
    }

    /**
     * Renderizar la vista del componente.
     */
    public function render()
    {
        return view('componentes.estadio');
    }
}
