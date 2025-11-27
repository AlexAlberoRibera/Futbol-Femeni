<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;
use App\Models\Jugadora;

class JugadorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener equipos por nombre exacto
        $barca = Equipo::where('nombre', 'Barça Femenino')->first();
        $atleti = Equipo::where('nombre', 'Atlético de Madrid')->first();
        $madrid = Equipo::where('nombre', 'Real Madrid Femenino')->first();

        // Validar que existen
        if (!$barca || !$atleti || !$madrid) {
            $this->command->error('No se encontraron los equipos necesarios para crear las jugadoras.');
            return;
        }

        // Crear las 3 jugadoras
        Jugadora::create([
            'nombre' => 'Alex',
            'dorsal' => 3,
            'posicion' => 'Defensa',
            'fecha_nacimiento' => '2004-02-04',
            'foto' => null,
            'equipo_id' => $barca->id,
        ]);

        Jugadora::create([
            'nombre' => 'Esther González',
            'dorsal' => 9,
            'posicion' => 'Delantera',
            'fecha_nacimiento' => '1992-09-13',
            'foto' => null,
            'equipo_id' => $atleti->id,
        ]);

        Jugadora::create([
            'nombre' => 'Misa Rodríguez',
            'dorsal' => 1,
            'posicion' => 'Portera',
            'fecha_nacimiento' => '1999-01-30',
            'foto' => null,
            'equipo_id' => $madrid->id,
        ]);

        $this->command->info('Se han creado 3 jugadoras correctamente.');
    }
}
