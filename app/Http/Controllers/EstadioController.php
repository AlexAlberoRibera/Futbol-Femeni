<?php

namespace App\Http\Controllers;

use App\Models\Estadio;
use Illuminate\Http\Request;

class EstadioController extends Controller
{
        protected $table = 'estadios'; // nombre real de la tabla en la BD
   public function index()
{
    $estadios = Estadio::all(); 
    return view('estadios.index', compact('estadios'));
}


    public function show(Estadio $estadio)
    {
        return view('estadios.show', compact('estadio'));
    }

    public function create() { 
        return view('estadios.create'); 
    }

    public function store(Request $request)
    {
        $estadio = new Estadio($request->all());
        $estadio->save();
        return redirect()->route('estadios.index')->with('success', 'Equipo añadido correctamente!');
    }

    public function edit(Estadio $estadio){
        return view('estadios.edit', compact('estadio'));
    }

    public function update(Request $request, Estadio $estadio){
        $estadio->update($request->all());
        return redirect()->route('estadios.index')->with('success', 'Equipo añadido correctamente!');
    }

    public function destroy(Estadio $estadio){
        $estadio->delete();
        return redirect()->route('estadios.index')->with('success', 'Equipo añadido correctamente!');
    }
}