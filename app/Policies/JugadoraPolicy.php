<?php

namespace App\Policies;

use App\Models\Jugadora;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JugadoraPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true; // Admin puede todo
        }
    }

    public function create(User $user)
    {
        return $user->isManager();
    }

    public function update(User $user, Jugadora $jugadora)
    {
        return $user->isManager() && $user->equipo_id === $jugadora->equipo_id;
    }

    public function delete(User $user, Jugadora $jugadora)
    {
        return $user->isManager() && $user->equipo_id === $jugadora->equipo_id;
    }
}
