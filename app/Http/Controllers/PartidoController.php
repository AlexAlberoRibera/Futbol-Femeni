<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\User;
use App\Http\Requests\PartitRequest;

class PartidoController extends Controller
{
    public function index() {
        $partidos = Partido::with(['local', 'visitante'])->get();
        return view('partidos.index', compact('partidos'));
    }
    public function edit(Partido $partido) {
        // Solo admin o el árbitro asignado pueden editar
        if (!auth()->user()->isAdmin() && !(auth()->user()->isArbitre() && auth()->user()->id === $partido->arbitro_id)) {
            abort(403, 'No tienes permiso para editar este partido');
        }

        $arbitros = User::where('role', User::ROLE_ARBITRE)->get();
        return view('partidos.edit', compact('partido', 'arbitros'));
    }

    public function update(Request $request, Partido $partido) {
        // Solo admin o el árbitro asignado pueden actualizar
        if (!auth()->user()->isAdmin() && !(auth()->user()->isArbitre() && auth()->user()->id === $partido->arbitro_id)) {
            abort(403, 'No tienes permiso para actualizar este partido');
        }

        $validated = $request->validate([
            'resultado' => 'nullable|regex:/^\d+-\d+$/',
            'arbitro_id' => 'nullable|exists:users,id',
        ]);

        // Solo admin puede cambiar el árbitro
        if (!auth()->user()->isAdmin()) {
            unset($validated['arbitro_id']);
        }

        $partido->update($validated);

        return redirect()->route('partidos.index')
            ->with('success', 'Partido actualizado correctamente');
    }

    public function updateResult(PartitRequest $request, Partido $partido) {
        $partido->update(['resultado' => $request->resultado]);
        return redirect()->route('partidos.index')->with('success', 'Resultado actualizado');
    }

    public function historic() {
        return view('partidos.historico');
    }

    public function show(Partido $partido) {
        return view('partidos.show', compact('partido'));
    }

    public function calendario() {
        $partidos = Partido::with(['local', 'visitante', 'arbitro'])
            ->orderBy('fecha')
            ->get()
            ->groupBy(function ($partido) {
                return $partido->fecha->format('Y-m-d');
            });

        return view('partidos.calendario', compact('partidos'));
    }
}