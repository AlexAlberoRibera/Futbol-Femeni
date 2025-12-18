<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadiosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estadios')->insert([
            [
                'nombre' => 'Campo Nuevo',
                'ciudad' => 'Barcelona',
                'capacidad' => 99000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Wanda Metropolitano',
                'ciudad' => 'Madrid',
                'capacidad' => 68000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Santiago Bernabéu',
                'ciudad' => 'Madrid',
                'capacidad' => 81000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
