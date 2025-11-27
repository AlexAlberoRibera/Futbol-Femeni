<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipRequest;
use App\Http\Requests\UpdateEquipRequest;
use App\Models\Equipo;
use App\Models\Estadio;
use App\Services\EquipService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EquipoController extends Controller
{
    public function __construct(private EquipService $servicio) {}


    // GET /equipos
    public function index()
    {
        return view('equipos.index', ['equipos' => $this->servicio->llistar()]);
    }

    // GET equipos
    public function create()
    {
        $estadios = Estadio::all();
        return view('equipos.create', compact('estadios'));
    }

    // POST /equipos
    public function store(StoreEquipRequest $request)
    {
        $this->servicio->guardar($request->validated());
        return redirect()->route('equipos.index');
    }
    // GET /equpos/{id}
    public function show(Equipo $equipo)
    {
        return view('equipos.show', compact('equipo'));
    }
    // GET /equips/{id}/edit
    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    // PUT /equips/{id}/edit
    public function update(Request $request, Equipo $equipo)
    {
        $this->servicio->actualitzar($equipo, $request->validated());
        return redirect()->route('equipos.index')->with('ok', 'Equipo actualizado');
    }


    // DELETE /equips/{id}
    public function destroy($id)
    {
        $this->servicio->eliminar($id);
        return redirect()->route('equipos.index');
    }

    // GET /equipos/{equipo}/jugadoras
    public function jugadoras(Equipo $equipo)
    {
        // Traemos las jugadoras del equipo
        $jugadoras = $equipo->jugadoras()->get();

        return view('equipos.jugadoras', compact('equipo', 'jugadoras'));
    }
}
