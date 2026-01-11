<?php

namespace App\Policies;

use App\Models\Partido;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartidoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Partido $partido)
    {
        return true;
    }

    public function update(User $user, Partido $partido)
    {
        // Solo admin o el árbitro asignado puede actualizar resultado
        return $user->role === 'admin' || ($user->role === 'arbitre' && $user->id === $partido->arbitre_id);
    }
}
