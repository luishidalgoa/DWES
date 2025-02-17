<?php

namespace Database\Factories;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition()
    {
        return [
            'fullname' => $this->faker->name(), // Genera un nombre completo falso
            'age' => $this->faker->numberBetween(25, 70), // Genera una edad falsa entre 25 y 70 años
            'gender' => $this->faker->randomElement(['male', 'female']), // Genera un género falso (masculino o femenino)
            'address' => $this->faker->address(), // Genera una dirección falsa
            'telephone' => $this->faker->phoneNumber(), // Genera un número de teléfono falso
            'email' => $this->faker->unique()->safeEmail(), // Genera un correo electrónico único y falso
            'created_at' => now(), // Establece la fecha y hora actual para el campo created_at
            'updated_at' => now(), // Establece la fecha y hora actual para el campo updated_at
        ];
    }
}