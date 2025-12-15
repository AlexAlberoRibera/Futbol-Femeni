<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Jugadora extends Component
{
    public string $nombre;
    public string $equipo;
    public string $posicion;

    public function __construct($nombre, $equipo, $posicion)
    {
        $this->nombre = $nombre;
        $this->equipo = $equipo;
        $this->posicion = $posicion;
    }

    public function render()
    {
        return view('components.jugadora');
    }
}
