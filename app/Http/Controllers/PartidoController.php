<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Equipo;

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
            'local_id' => 'required|different:visitante_id|exists:equipos,id',
            'visitante_id' => 'required|exists:equipos,id',
            'fecha' => 'required|date',
            'resultado' => ['nullable', 'regex:/^\d+-\d+$/'],
        ]);

        Partido::create($validated);

        return redirect()->route('partidos.index')
                         ->with('success', 'Partido añadido correctamente.');
    }
}
