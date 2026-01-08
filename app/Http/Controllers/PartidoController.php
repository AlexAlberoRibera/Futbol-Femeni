<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with(['local', 'visitante'])->get();
        return view('partidos.index', compact('partidos'));
    }

    public function updateResult(Request $request, Partido $partido)
    {
        // Ara authorize() funciona perfectament
        $this->authorize('updateResult', $partido);

        $request->validate([
            'resultado' => 'required|string|max:10',
        ]);

        $partido->update([
            'resultado' => $request->resultado,
        ]);

        return redirect()->route('partidos.index')
            ->with('success', 'Resultado actualizado correctamente');
    }
}
