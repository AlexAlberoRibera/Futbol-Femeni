<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JugadoraController extends Controller
{
    public $jugadoras = [];

    public function index()
    {
        $jugadoras = Session::get('jugadoras', $this->jugadoras);
        return view('jugadoras.index', compact('jugadoras'));
    }

    public function create()
    {
        return view('jugadoras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:3',
            'equipo' => 'required|min:2',
            'posicion' => 'required|in:Portera,Defensa,Centrocampista,Delantera',
        ]);

        $jugadoras = Session::get('jugadoras', $this->jugadoras);
        $jugadoras[] = $validated;
        Session::put('jugadoras', $jugadoras);

        return redirect()->route('jugadoras.index')->with('success', '¡Jugadora añadida correctamente!');
    }
}
