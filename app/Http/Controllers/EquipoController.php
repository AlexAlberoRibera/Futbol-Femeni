<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Estadio;

class EquipoController extends Controller
{
    /**
     * Mostrar todos los equipos
     */
    public function index()
    {
        $equipos = Equipo::with('estadio')->get();
        return view('equipos.index', compact('equipos'));
    }

    /**
     * Mostrar un equipo
     */
    public function show(int $id)
    {
        $equipo = Equipo::with(['estadio', 'partidosComoLocal', 'partidosComoVisitante'])->findOrFail($id);
        return view('equipos.show', compact('equipo'));
    }

    /**
     * Formulario para crear un nuevo equipo
     */
    public function create()
    {
        $estadios = Estadio::all(); // Para un select de estadios
        return view('equipos.create', compact('estadios'));
    }

    /**
     * Guardar un nuevo equipo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'estadio_id' => 'required|exists:estadios,id',
            'titulos' => 'required|integer|min:0',
        ]);

        Equipo::create($validated);

        return redirect()->route('equipos.index')->with('success', 'Equipo añadido correctamente!');
    }
}
