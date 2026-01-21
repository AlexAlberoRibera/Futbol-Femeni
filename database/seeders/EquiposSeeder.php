<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Estadio;
use App\Models\User;
use Illuminate\Database\Seeder;

class EquiposSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', User::ROLE_ADMIN)->first();

        if (!$admin) {
            // Si no hay admin, lo creamos rápido
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@futbol.com',
                'password' => bcrypt('password'),
                'role' => User::ROLE_ADMIN,
            ]);
        }

        // Ahora buscamos los estadios creados antes
        $campoNuevo = Estadio::where('nombre', 'Campo Nuevo')->first();
        $wanda = Estadio::where('nombre', 'Wanda Metropolitano')->first();
        $bernabeu = Estadio::where('nombre', 'Santiago Bernabéu')->first();

        // Creamos equipos con firstOrCreate para no duplicar
        Equipo::firstOrCreate(['nombre' => 'Barça Femení'], [
            'titulos' => 30,
            'estadio_id' => $campoNuevo->id,
            'user_id' => $admin->id,
        ]);

        Equipo::firstOrCreate(['nombre' => 'Atlètic de Madrid'], [
            'titulos' => 10,
            'estadio_id' => $wanda->id,
            'user_id' => $admin->id,
        ]);

        Equipo::firstOrCreate(['nombre' => 'Real Madrid Femení'], [
            'titulos' => 5,
            'estadio_id' => $bernabeu->id,
            'user_id' => $admin->id,
        ]);
    }
}
