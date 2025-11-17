<?php

namespace App\Repositories;

use App\Models\Equipo;

class EquipRepository implements BaseRepository {
    public function getAll() {
        return Equipo::all();
    }

    public function find($id) {
        return Equipo::findOrFail($id);
    }

    public function create(array $data) {
        return Equipo::create($data);
    }

    public function update($id, array $data) {
        $equip = Equipo::findOrFail($id);
        $equip->update($data);
        return $equip;
    }

    public function delete($id) {
        return Equipo::destroy($id);
    }
}