<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartidoController extends Controller
{
    public $partidos = [];

    public function index()
    {
        $partidos = Session::get('partidos', $this->partidos);
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
            'resultado' => ['nullable', 'regex:/^\d+-\d+$/'],
        ], [
            'resultado.regex' => 'El resultado debe tener el formato 0-0, por ejemplo 2-1.'
        ]);

        $partidos = Session::get('partidos', $this->partidos);
        $partidos[] = $validated;
        Session::put('partidos', $partidos);

        return redirect()->route('partidos.index')->with('success', '¡Partido añadido correctamente!');
    }
}
