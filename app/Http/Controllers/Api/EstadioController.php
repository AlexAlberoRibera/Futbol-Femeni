<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estadio;
use Illuminate\Http\Request;

class EstadioController extends Controller
{
    public function index()
    {
        return Estadio::all();
    }

    public function show(Estadio $estadio)
    {
        return $estadio;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'ciudad' => 'required',
            'capacidad' => 'required|integer|min:1000',
        ]);

        return Estadio::create($validated);
    }

    public function update(Request $request, Estadio $estadio)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'ciudad' => 'required',
            'capacidad' => 'required|integer|min:1000',
        ]);

        $estadio->update($validated);
        return $estadio;
    }

    public function destroy(Estadio $estadio)
    {
        $estadio->delete();
        return response()->noContent();
    }
}
