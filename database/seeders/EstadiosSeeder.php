<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estadios')->insert([
            ['nombre' => 'Campo Nuevo', 'ciudad' => 'Barcelona', 'capacidad' => 99000],
            ['nombre' => 'Wanda Metropolitano', 'ciudad' => 'Madrid', 'capacidad' => 68000],
            ['nombre' => 'Santiago Bernabéu', 'ciudad' => 'Madrid', 'capacidad' => 81000],
        ]);
    }
}
