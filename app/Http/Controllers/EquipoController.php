<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EquipoController extends Controller
{
    // Datos iniciales
    public $equipos = [
        ['nombre' => 'Barça Femenino',       'estadio' => 'Camp Nou',               'titulos' => 30],
        ['nombre' => 'Atlético de Madrid',   'estadio' => 'Cívitas Metropolitano', 'titulos' => 10],
        ['nombre' => 'Real Madrid Femenino', 'estadio' => 'Alfredo Di Stéfano',    'titulos' => 5],
    ];

    // Listado de equipos
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $equipos = Session::get('equipos', $this->equipos);
        return view('equipos.index', compact('equipos'));
    }

     
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('equipos.create');
    }
 
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'  => 'required|min:3',
            'estadio' => 'required|min:3',
            'titulos' => 'required|integer|min:0',
        ]);

        $equipos = Session::get('equipos', $this->equipos);
        $equipos[] = $validated;
        Session::put('equipos', $equipos);

        return redirect()->route('equipos.index')->with('success', 'Equipo añadido correctamente!');
    }

    // Mostrar detalle de un equipo
    public function show(int $id)
    {
        $equipos = Session::get('equipos', $this->equipos);
        abort_if(!isset($equipos[$id]), 404);
        $equipo = $equipos[$id];
        return view('equipos.show', compact('equipo'));
    }
}
