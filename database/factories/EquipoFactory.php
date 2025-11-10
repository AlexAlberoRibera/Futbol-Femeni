<?php

namespace Database\Factories;

use App\Models\Estadio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equip>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'nombre' => $this->faker->unique()->company,
            'titulos' => $this->faker->numberBetween(0, 50),
            'estadio_id' =>  Estadio::factory(),
            //'escut' => 'escuts/dummy.png',
        ];
    }
}