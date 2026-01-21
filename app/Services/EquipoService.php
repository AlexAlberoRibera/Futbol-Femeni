<?php

namespace App\Services;

use App\Models\Equipo;
use App\Models\Estadio;
use Illuminate\Support\Facades\Storage;

class EquipoService
{
    public function store(array $data): Equipo
    {
        // Subida de escudo si existe
        if (isset($data['escudo'])) {
            $data['escudo'] = $this->uploadEscudo($data['escudo']);
        }

        // Crear equipo
        $equipo = Equipo::create($data);

        // Actualizar estadio con equipo principal
        if (isset($data['estadio_id'])) {
            $estadio = Estadio::find($data['estadio_id']);
            if ($estadio) {
                $estadio->equipo_principal_id = $equipo->id;
                $estadio->save();
            }
        }

        return $equipo;
    }

    public function update(Equipo $equipo, array $data): Equipo
    {
        // Subir escudo nuevo
        if (isset($data['escudo'])) {
            if ($equipo->escudo) {
                Storage::disk('public')->delete($equipo->escudo);
            }
            $data['escudo'] = $this->uploadEscudo($data['escudo']);
        }

        $equipo->update($data);

        // Actualizar estadio si cambió
        if (isset($data['estadio_id'])) {
            $estadio = Estadio::find($data['estadio_id']);
            if ($estadio) {
                $estadio->equipo_principal_id = $equipo->id;
                $estadio->save();
            }
        }

        return $equipo;
    }

    private function uploadEscudo($file): string
    {
        return $file->store('escudos', 'public');
    }
    public function delete(Equipo $equipo): void
    {
        // Eliminar escudo si existe
        if ($equipo->escudo) {
            Storage::disk('public')->delete($equipo->escudo);
        }

        $equipo->delete();
    }
}
