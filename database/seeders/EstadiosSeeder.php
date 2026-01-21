<?php

namespace Database\Seeders;

use App\Models\Estadio;
use App\Models\Equipo;
use Illuminate\Database\Seeder;

class EstadiosSeeder extends Seeder
{
    public function run(): void
    {
        $campoNuevo = Estadio::firstOrCreate(
            ['nombre' => 'Campo Nuevo'],
            ['ciudad' => 'Barcelona', 'capacidad' => 99000]
        );

        $wanda = Estadio::firstOrCreate(
            ['nombre' => 'Wanda Metropolitano'],
            ['ciudad' => 'Madrid', 'capacidad' => 68000]
        );

        $bernabeu = Estadio::firstOrCreate(
            ['nombre' => 'Santiago Bernabéu'],
            ['ciudad' => 'Madrid', 'capacidad' => 81000]
        );

        $barca = Equipo::firstOrCreate(
            ['nombre' => 'Barça Femení'],
            ['titulos' => 30, 'estadio_id' => $campoNuevo->id]
        );

        $atleti = Equipo::firstOrCreate(
            ['nombre' => 'Atlètic de Madrid'],
            ['titulos' => 10, 'estadio_id' => $wanda->id]
        );

        $madrid = Equipo::firstOrCreate(
            ['nombre' => 'Real Madrid Femení'],
            ['titulos' => 5, 'estadio_id' => $bernabeu->id]
        );

        $campoNuevo->update(['equipo_principal_id' => $barca->id]);
        $wanda->update(['equipo_principal_id' => $atleti->id]);
        $bernabeu->update(['equipo_principal_id' => $madrid->id]);
    }
}
