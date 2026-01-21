<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadio;

class EstadioController extends Controller
{
    public function index()
    {
        $estadios = Estadio::all(); // Trae todos los estadios de la BD
        return view('estadios.index', compact('estadios'));
    }

    public function create()
    {
        return view('estadios.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'ciudad' => 'nullable|string|max:255',
        'capacidad' => 'nullable|integer',
    ]);

    Estadio::create($validated); // ← esto guarda en la base

    return redirect()->route('estadios.index')
        ->with('success', 'Estadio creado correctamente');
}

}
