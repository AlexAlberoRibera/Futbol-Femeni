<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugadora;
use App\Models\Equipo;

class JugadoraController extends Controller
{
    public function index()
    {
        $jugadoras = Jugadora::with('equipo')->get();
        return view('jugadoras.index', compact('jugadoras'));
    }

   public function create()
{
    $this->authorize('create', Jugadora::class); // Solo managers o admin
    $equipos = Equipo::all();
    $posiciones = ['Portera', 'Defensa', 'Mediocampista', 'Delantera'];
    return view('jugadoras.create', compact('equipos', 'posiciones'));
}

public function store(Request $request)
{
    $this->authorize('create', Jugadora::class); // Solo managers o admin

    $validated = $request->validate([
        'nombre' => 'required|min:3',
        'equipo_id' => 'required|exists:equipos,id',
        'posicion' => 'required|in:Portera,Defensa,Mediocampista,Delantera',
        'foto' => 'nullable|mimes:png|max:2048',
    ], [
        'foto.mimes' => 'Solo se permiten imágenes PNG.',
        'foto.max' => 'La imagen no puede superar los 2 MB.',
    ]);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $validated['foto'] = base64_encode(file_get_contents($file->getRealPath()));
    }

    Jugadora::create($validated);

    return redirect()->route('jugadoras.index')->with('success', 'Jugadora añadida correctamente.');
}

    public function show(Jugadora $jugadora)
    {
        return view('jugadoras.show', compact('jugadora'));
    }
}
