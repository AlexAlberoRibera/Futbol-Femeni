<?php

namespace App\Policies;

use App\Models\Equipo;
use App\Models\User;

class equipoPolicy
{
    public function update(User $user, equipo $equipo)
    {
        if ($user->role === 'admin') {
            return true;
        }

        if ($user->role === 'manager') {
            return $user->team_id === $equipo->id;
        }

        return false;
    }

    public function delete(User $user, equipo $equipo)
    {
        return $this->update($user, $equipo);
    }
}
