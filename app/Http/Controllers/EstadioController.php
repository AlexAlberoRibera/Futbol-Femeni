<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EstadioController extends Controller
{
    public $estadios = [
        [
            'nombre' => 'Estadio Johan Cruyff',
            'ciudad' => 'Sant Joan Despí',
            'capacidad' => 30,
            'equipo_principal'=> 'FC Barcelona',
        ],
        [
            'nombre' => 'Centro Deportivo Wanda Alcalá de Henares',
            'ciudad' => 'Alcalá de Henares',
            'capacidad'=> 2800,
            'equipo_principal' => 'Atlético de Madrid Femenino',
        ],
        [
            'nombre' => 'Estadio Alfredo Di Stéfano',
            'ciudad' => 'Madrid',
            'capacidad'=> 6000,
            'equipo_principal' => 'Real Madrid Femenino',
        ],
    ];

    public function index()
    {
        $estadios = Session::get('estadios', $this->estadios);
        return view('estadios.index', compact('estadios'));
    }

    public function show(int $id)
    {
        $estadios = Session::get('estadios', $this->estadios);
        abort_if(!isset($estadios[$id]), 404);

        $estadio = $estadios[$id];
        return view('estadios.show', compact('estadio'));
    }

    public function create()
    {
        return view('estadios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'ciudad' => 'required|min:2',
            'capacidad' => 'required|integer|min:0',
            'equipo_principal' => 'required|min:3',
        ]);

        $estadios = Session::get('estadios', $this->estadios);
        $estadios[] = $validated;
        Session::put('estadios', $estadios);

        return redirect()->route('estadios.index')->with('success', 'Estadio añadido correctamente!');
    }
}
