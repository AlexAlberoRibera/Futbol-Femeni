<?php

namespace App\Http\Controllers;

use App\Http\Requests\JugadoraRequest;
use App\Models\Jugadora;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JugadoraController extends Controller
{
    // Listar todas las jugadoras
    public function index()
    {
        $jugadoras = Jugadora::with('equipo')->get();
        return view('jugadoras.index', compact('jugadoras'));
    }

    // Mostrar formulario para crear jugadora
    public function create()
    {
        $posiciones = ['Portera', 'Defensa', 'Mediocampista', 'Delantera'];
        $equipos = Equipo::all(); // Para seleccionar equipo
        return view('jugadoras.create', compact('posiciones', 'equipos'));
    }

    // Guardar nueva jugadora
    public function store(JugadoraRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('jugadoras', 'public');
            $validated['foto'] = $path;
        } else {
            $validated['foto'] = null;
        }

        Jugadora::create($validated);

        return redirect()->route('jugadoras.index')->with('success', 'Jugadora añadida correctamente.');
    }

    // Mostrar jugadoras de un equipo específico
    public function porEquipo(Equipo $equipo)
    {
        $jugadoras = $equipo->jugadoras()->get();
        return view('jugadoras.porEquipo', compact('equipo', 'jugadoras'));
    }

    public function show(Jugadora $jugadora)
    {
        return view('jugadoras.show', compact('jugadora'));
    }
}
