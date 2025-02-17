<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(), // Genera un nombre de empresa falso
            'address' => $this->faker->address(), // Genera una dirección falsa
            'telephone' => $this->faker->phoneNumber(), // Genera un número de teléfono falso
            'email' => $this->faker->unique()->companyEmail(), // Genera un correo electrónico de empresa único y falso
            'date_creation' => $this->faker->date(), // Genera una fecha de creación falsa
            'professor_id' => Professor::factory(), // Asocia un profesor falso
            'created_at' => now(), // Establece la fecha y hora actual para el campo created_at
            'updated_at' => now(), // Establece la fecha y hora actual para el campo updated_at
        ];
    }
}