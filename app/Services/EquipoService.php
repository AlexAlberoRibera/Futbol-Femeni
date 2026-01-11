<?php

namespace App\Services;

use App\Models\Equipo;
use Illuminate\Support\Facades\Storage;

class EquipoService
{
    public function store(array $data): Equipo
    {
        if (isset($data['escudo'])) {
            $data['escudo'] = $this->uploadEscudo($data['escudo']);
        }

        return Equipo::create($data);
    }

    public function update(Equipo $equipo, array $data): Equipo
    {
        // Escudo opcional
        if (!empty($data['escudo'])) {
            if ($equipo->escudo) {
                Storage::disk('public')->delete($equipo->escudo);
            }
            $data['escudo'] = $this->uploadEscudo($data['escudo']);
        } else {
            // Si no hay escudo nuevo, no modificar el campo
            unset($data['escudo']);
        }

        $equipo->update($data);

        return $equipo;
    }

    private function uploadEscudo($file): string
    {
        return $file->store('escudos', 'public');
    }

    public function delete(Equipo $equipo): void
    {
        if ($equipo->escudo) {
            Storage::disk('public')->delete($equipo->escudo);
        }
        $equipo->delete();
    }
}
