<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Estadio;
use App\Models\User;
use Illuminate\Database\Seeder;

class equiposSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', User::ROLE_ADMIN)->firstOrFail();

        $campoNuevo = Estadio::where('nombre', 'Campo Nuevo')->firstOrFail();
        $wanda = Estadio::where('nombre', 'Wanda Metropolitano')->firstOrFail();
        $bernabeu = Estadio::where('nombre', 'Santiago Bernabéu')->firstOrFail();

        equipo::create([
            'nombre' => 'Barça Femení',
            'titulos' => 30,
            'estadio_id' => $campoNuevo->id,
            'user_id' => $admin->id,
        ]);

        equipo::create([
            'nombre' => 'Atlètic de Madrid',
            'titulos' => 10,
            'estadio_id' => $wanda->id,
            'user_id' => $admin->id,
        ]);

        equipo::create([
            'nombre' => 'Real Madrid Femení',
            'titulos' => 5,
            'estadio_id' => $bernabeu->id,
            'user_id' => $admin->id,
        ]);
    }
}
