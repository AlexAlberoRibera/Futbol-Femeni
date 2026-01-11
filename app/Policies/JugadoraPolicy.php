<?php

namespace App\Policies;

use App\Models\Jugadora;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JugadoraPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Jugadora $jugadora)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role === 'admin' || $user->role === 'manager';
    }

    public function update(User $user, Jugadora $jugadora)
    {
        return $user->role === 'admin'
            || ($user->role === 'manager' && $user->team_id === $jugadora->equipo_id);
    }

    public function delete(User $user, Jugadora $jugadora)
    {
        return $user->role === 'admin'
            || ($user->role === 'manager' && $user->team_id === $jugadora->equipo_id);
    }
}
