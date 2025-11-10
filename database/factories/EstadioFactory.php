<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estadio;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estadio>
 */
class EstadioFactory extends Factory
{
    protected $model = Estadio::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->city().' Stadium',
            'ciudad' => $this->faker->city(),           // <-- agregada la ciudad
            'capacidad' => $this->faker->numberBetween(10000, 100000),
        ];
    }
}
