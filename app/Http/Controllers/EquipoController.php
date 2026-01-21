<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Estadio;
use App\Services\EquipoService;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;

class EquipoController extends Controller
{
    public function __construct(private EquipoService $service)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipos = Equipo::with('estadio')->get();

        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        $estadios = Estadio::all(); // Trae todos los estadios de la BD
        return view('equipos.create', compact('estadios'));
    }

    public function show(Equipo $equipo)
    {
        return view('equipos.show', compact('equipo'));
    }

    public function store(StoreEquipoRequest $request)
    {
        $data = $request->validated();

        // Guardar el escudo si se sube
        if ($request->hasFile('escudo')) {
            $data['escudo'] = $request->file('escudo')->store('escudos', 'public');
        }

        // Crear el equipo
        $equipo = Equipo::create($data);

        // Actualizar el estadio para que apunte a este equipo
        $estadio = Estadio::find($data['estadio_id']);
        if ($estadio) {
            $estadio->equipo_principal_id = $equipo->id;
            $estadio->save();
        }

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente.');
    }

    public function edit(Equipo $equipo)
    {
        $this->authorize('update', $equipo);

        $estadios = Estadio::all();
        return view('equipos.edit', compact('equipo', 'estadios'));
    }

    public function update(UpdateEquipoRequest $request, Equipo $equipo)
    {
        $this->authorize('update', $equipo);

        $this->service->update($equipo, $request->validated());

        return redirect()
            ->route('equipos.index')
            ->with('success', 'Equipo actualizado correctamente');
    }

    public function destroy(Equipo $equipo)
    {
        $this->authorize('delete', $equipo);

        $this->service->delete($equipo);

        return redirect()
            ->route('equipos.index')
            ->with('success', 'Equipo eliminado correctamente');
    }
}
