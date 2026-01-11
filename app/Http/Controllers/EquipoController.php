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
        $estadios = Estadio::all();
        return view('equipos.create', compact('estadios'));
    }

    public function store(StoreEquipoRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo creado correctamente.');
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
