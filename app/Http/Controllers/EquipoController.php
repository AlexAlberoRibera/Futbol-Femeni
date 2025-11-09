<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EquipoController extends Controller
{
    public $equipos = [
        ['nombre' => 'Barça Femenino',      'estadio' => 'Camp Nou',               'titulos' => 30],
        ['nombre' => 'Atletico de Madrid',  'estadio' => 'Cívitas Metropolitano',  'titulos' => 10],
        ['nombre' => 'Real Madrid Femenino', 'estadio' => 'Alfredo Di Stéfano',    'titulos' => 5],
    ];

    public function index()
    {
        $equipos = Session::get('equipos', $this->equipos);
        return view('equipos.index', compact('equipos'));
    }

    public function show(int $id)
    {
        $equips = Session::get('equips', $this->equipos);
        abort_if(!isset($equips[$id]), 404);
        $equip = $equips[$id];
        return view('equips.show', compact('equip'));
    }

    public function create() { return view('equips.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'    => 'required|min:3',
            'estadio' => 'required',
            'titulos' => 'required|integer|min:0',
        ]);

        $equipos = Session::get('equipos', $this->equipos);
        $equipos[] = $validated;
        Session::put('equips', $equipos);

        return redirect()->route('equipos.index')->with('success', 'Equipo añadido correctamente!');
    }
}