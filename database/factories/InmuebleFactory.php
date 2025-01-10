<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inmueble>
 */
class InmuebleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numcat'=>Str::uuid(),
            'direccion'=>fake()->streetName(),
            'numero'=>fake()->numberBetween(1,2000),
            'bloque'=>fake()->randomLetter(),
            'piso'=>fake()->numberBetween(0,100),
            'puerta'=>fake()->randomLetter(),
            'ciudad_id'=>Ciudad::obtenerIdCiudadAleatorio()
        ];
    }
}
