<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EquipoController extends Controller
{
    public $equipos = [
        ['nombre' => 'Barça Femenino',      'estadio' => 'Camp Nou',               'titulos' => 30],
        ['nombre' => 'Atletico de Madrid',  'estadio' => 'Cívitas Metropolitano',  'titulos' => 10],
        ['nombre' => 'Real Madrid Femenino', 'estadio' => 'Alfredo Di Stéfano',    'titulos' => 5],
    ];

    public function index()
    {
        $equipos = Session::get('equipos', $this->equipos);
        return view('equipos.index', compact('equipos'));
    }

   public function show(int $id)
{
    $equipos = Session::get('equipos', $this->equipos);
    abort_if(!isset($equipos[$id]), 404);
    $equipo = $equipos[$id]; // <-- guardamos en $equipo
    return view('equipos.show', compact('equipo'));
}


    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'estadio' => 'required',
            'titulos' => 'required|integer|min:0',
        ]);

        // Recuperar los equipos de sesión
        $equipos = Session::get('equipos', $this->equipos);

        // Añadir el nuevo equipo
        $equipos[] = $validated;

        // Guardar de nuevo en la misma clave 'equipos'
        Session::put('equipos', $equipos);

        return redirect()->route('equipos.index')->with('success', 'Equipo añadido correctamente!');
    }
}
