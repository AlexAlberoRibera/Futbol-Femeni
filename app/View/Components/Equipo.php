<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Equipo extends Component
{
    public $nombre;
    public $estadio;
    public $titulos;

    public function __construct($nombre, $estadio, $titulos)
    {
        $this->nombre = $nombre;
        $this->estadio = $estadio;
        $this->titulos = $titulos;
    }

    public function render()
    {
        return view('componentes.equipo');
    }
}
