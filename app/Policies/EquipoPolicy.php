<?php

namespace App\Policies;

use App\Models\Equipo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipoPolicy
{
    use HandlesAuthorization;

    /**
     * Determina si el usuario puede ver cualquier equipo.
     */
    public function viewAny(User $user)
    {
        return true; // Todos pueden ver la lista
    }

    /**
     * Determina si el usuario puede ver un equipo específico.
     */
    public function view(User $user, Equipo $equipo)
    {
        return true;
    }

    /**
     * Determina si el usuario puede crear equipos.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determina si el usuario puede actualizar el equipo.
     */
    public function update(User $user, Equipo $equipo)
    {
        return $user->role === 'admin' || ($user->role === 'manager' && $user->team_id === $equipo->id);
    }

    /**
     * Determina si el usuario puede eliminar el equipo.
     */
    public function delete(User $user, Equipo $equipo)
    {
        return $user->role === 'admin';
    }
}
