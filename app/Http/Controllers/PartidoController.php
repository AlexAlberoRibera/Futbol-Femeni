<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index(Request $request)
    {
        $partidos = $request->session()->get('partidos', [
            ['local' => 'Barça Femenino', 'visitante' => 'Atlético de Madrid', 'fecha' => '2024-11-30', 'resultado' => ''],
            ['local' => 'Real Madrid Femenino', 'visitante' => 'Barça Femenino', 'fecha' => '2024-12-15', 'resultado' => '0-3'],
        ]);

        $request->session()->put('partidos', $partidos);

        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        return view('partidos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'local' => 'required|min:2',
            'visitante' => 'required|min:2|different:local',
            'fecha' => 'required|date_format:Y-m-d',
            'resultado' => ['nullable', 'regex:/^\d+-\d+$/']
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'different' => 'El equipo visitante debe ser diferente al local.',
            'date_format' => 'La fecha debe tener el formato Año-Mes-Día (YYYY-MM-DD).',
            'regex' => 'El resultado debe tener el formato número-número (por ejemplo: 2-1).'
        ]);

        $partidos = $request->session()->get('partidos', []);
        $partidos[] = $validated;
        $request->session()->put('partidos', $partidos);

        return redirect()->route('partidos.index')->with('success', 'Partido añadido correctamente.');
    }
}
