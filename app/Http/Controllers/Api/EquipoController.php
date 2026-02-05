<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;

class EquipoController extends Controller
{
    public function index()
    {
        return Equipo::all();
    }

    public function show(Equipo $equipo)
    {
        return $equipo;
    }

    public function store(StoreEquipoRequest $request)
    {
        return Equipo::create($request->validated());
    }

    public function update(UpdateEquipoRequest $request, Equipo $equipo)
    {
        $equipo->update($request->validated());
        return $equipo;
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return response()->noContent();
    }
}
