<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perfil>
 */
class PerfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'metros'=>fake()->randomFloat(2,10,2000),
            'habitaciones'=>fake()->numberBetween(0,50),
            'banyos'=>fake()->numberBetween(0,20),
            'ascensor'=>fake()->boolean(),
            'eficiencia'=>fake()->randomElement(['A','B','C','D','E','F','G']),
            'anyo'=>fake()->year()
            //No rellenamos el campo inmueble_id
        ];
    }
}
