<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Estadio;
use Illuminate\Support\Facades\Auth;

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
        $equipo = Equipo::with(['estadio', 'partidosComoLocal', 'partidosComoVisitante'])
            ->findOrFail($id);

        return view('equipos.show', compact('equipo'));
    }

    /**
     * Formulario para crear un nuevo equipo
     */
    public function create()
    {
        $estadios = Estadio::all();
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
            'escut' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('escut')) {
            $path = $request->file('escut')->store('equipos', 'public');
        }

        Equipo::create([
            'nombre' => $validated['nombre'],
            'estadio_id' => $validated['estadio_id'],
            'titulos' => $validated['titulos'],
            'user_id' => Auth::id(),
            'escut' => $path,
        ]);

        return redirect()->route('equipos.index')->with('success', 'Equipo añadido correctamente!');
    }
}
