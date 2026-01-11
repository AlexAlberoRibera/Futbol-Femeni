<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Http\Requests\PartitRequest;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with(['local', 'visitante'])->get();
        return view('partidos.index', compact('partidos'));
    }

    public function updateResult(PartitRequest $request, Partido $partido)
    {
        $partido->update(['resultado' => $request->resultado]);

        return redirect()->route('partidos.index')->with('success', 'Resultado actualizado');
    }
    public function historic()
    {
        return view('partidos.historico');
    }
}
