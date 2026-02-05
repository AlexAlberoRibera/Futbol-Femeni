<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use App\Http\Resources\PartidoResource;
use App\Http\Resources\PartidoCollection;
use App\Http\Requests\StorePartidoRequest;
use App\Http\Requests\UpdateResultadoPartidoRequest;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with('local', 'visitante', 'arbitro')->paginate(10);
        return new PartidoCollection($partidos);
    }

    public function show(Partido $partido)
    {
        $partido->load('local', 'visitante', 'arbitro');
        return new PartidoResource($partido);
    }


    public function store(StorePartidoRequest $request)
    {
        $partido = Partido::create($request->validated());
        return new PartidoResource($partido);
    }

    public function updateResultado(
        UpdateResultadoPartidoRequest $request,
        Partido $partido
    ) {
        $partido->update($request->validated());
        return new PartidoResource($partido);
    }

    public function destroy(Partido $partido)
    {
        $partido->delete();
        return response()->noContent();
    }
}
