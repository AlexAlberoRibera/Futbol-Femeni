<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugadora;
use App\Models\Equipo;
use App\Http\Resources\JugadoraResource;
use App\Http\Resources\JugadoraCollection;
use App\Http\Requests\StoreJugadoraRequest;
use App\Http\Requests\UpdateJugadoraRequest;

class JugadoraController extends Controller
{
    public function index()
    {
        $jugadoras = Jugadora::with('equipo')->paginate(10);
        return new JugadoraCollection($jugadoras);
    }

    public function show(Jugadora $jugadora)
    {
        $jugadora->load('equipo');
        return new JugadoraResource($jugadora);
    }

    public function store(StoreJugadoraRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $validated['foto'] = base64_encode(file_get_contents($file->getRealPath()));
        }

        $jugadora = Jugadora::create($validated);

        return new JugadoraResource($jugadora);
    }

    public function update(UpdateJugadoraRequest $request, Jugadora $jugadora)
    {
        $jugadora->update($request->validated());
        return new JugadoraResource($jugadora);
    }

    public function destroy(Jugadora $jugadora)
    {
        $jugadora->delete();
        return response()->noContent();
    }
}
