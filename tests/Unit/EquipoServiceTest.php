<?php

namespace App\Services;

use App\Models\Equipo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EquipoService
{
    public function store(array $data, ?UploadedFile $escudo = null): equipo
    {
        if ($escudo) {
            $data['escudo'] = $escudo->store('escudos', 'public');
        }

        return equipo::create($data);
    }

    public function update(equipo $equipo, array $data, ?UploadedFile $escudo = null): equipo
    {
        if ($escudo) {
            // Borrar escudo antiguo
            if ($equipo->escudo) {
                Storage::disk('public')->delete($equipo->escudo);
            }

            $data['escudo'] = $escudo->store('escudos', 'public');
        }

        $equipo->update($data);

        return $equipo;
    }

    public function destroy(equipo $equipo): void
    {
        if ($equipo->escudo) {
            Storage::disk('public')->delete($equipo->escudo);
        }

        $equipo->delete();
    }
}
