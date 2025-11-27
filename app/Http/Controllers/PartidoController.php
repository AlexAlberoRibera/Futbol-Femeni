<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with(['local', 'visitante'])->get();
        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('partidos.create', compact('equipos'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id|different:equipo_visitante_id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'fecha' => 'required|date_format:Y-m-d',
            'resultado' => ['nullable', 'regex:/^\d+-\d+$/']
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'different' => 'El equipo visitante debe ser diferente al local.',
            'date_format' => 'La fecha debe tener el formato Año-Mes-Día (YYYY-MM-DD).',
            'regex' => 'El resultado debe tener el formato número-número (por ejemplo: 2-1).'
        ]);

        Partido::create($validated);

        return redirect()->route('partidos.index')->with('success', 'Partido añadido correctamente.');
    }
}
