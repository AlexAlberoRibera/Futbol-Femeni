<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JugadoraController extends Controller
{
    public function index(Request $request)
    {
        $jugadoras = $request->session()->get('jugadoras', [
            ['nombre' => 'Alexia Putellas', 'equipo' => 'Barça Femenino', 'posicion' => 'Mediocampista'],
            ['nombre' => 'Esther González', 'equipo' => 'Atlético de Madrid', 'posicion' => 'Delantera'],
            ['nombre' => 'Misa Rodríguez', 'equipo' => 'Real Madrid Femenino', 'posicion' => 'Portera'],
        ]);

        $request->session()->put('jugadoras', $jugadoras);

        return view('jugadoras.index', compact('jugadoras'));
    }

    public function create()
    {
        // Lista de posiciones disponibles para el select
        $posiciones = ['Portera', 'Defensa', 'Mediocampista', 'Delantera'];
        return view('jugadoras.create', compact('posiciones'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'equipo' => 'required|min:2',
            'posicion' => 'required|in:Portera,Defensa,Mediocampista,Delantera'
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'in' => 'La posición seleccionada no es válida.'
        ]);

        $jugadoras = $request->session()->get('jugadoras', []);
        $jugadoras[] = $validated;
        $request->session()->put('jugadoras', $jugadoras);

        return redirect()->route('jugadoras.index')->with('success', 'Jugadora añadida correctamente.');
    }
}
