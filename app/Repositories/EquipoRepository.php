<?php

namespace App\Repositories;

use App\Models\Equipo;

class equipoRepository
{
    public function all()
    {
        return equipo::with(['partidosComoLocal', 'partidosComoVisitante'])->get();
    }

    public function create(array $data)
    {
        return equipo::create($data);
    }

    public function update(equipo $equipo, array $data)
    {
        $equipo->update($data);
        return $equipo;
    }

    public function delete(equipo $equipo)
    {
        return $equipo->delete();
    }
}
