<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name'=>fake()->name,//Con name se nos generará un nombre aleatorio
                'short_description'=>fake()->sentence,//Con sentence una frase
                'description'=>fake()->paragraph(3),//Con paragraph generaremos un párrafo, en mi caso he seleccionado que sean 3
                'price'=>fake()->numberBetween(1,125),//con numberBetween generaremos un número aleatorio entre 1 y 125 
            ];
    }
}
