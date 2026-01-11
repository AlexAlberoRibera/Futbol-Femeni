<?php

namespace App\Policies;

use App\Models\Partido;
use App\Models\User;

class PartidoPolicy
{
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true; // Admin pot fer TOT
        }
    }

    // nombreés l'àrbitre assignat pot modificar el resultat
    public function updateResult(User $user, Partido $partido)
    {
        return $user->isArbitre() && $partido->arbitro_id === $user->id;
    }
}
