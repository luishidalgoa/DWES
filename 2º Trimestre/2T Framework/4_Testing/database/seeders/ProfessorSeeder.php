<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;

class ProfessorSeeder extends Seeder
{
    /**
     * Ejecutar los seeds de la base de datos.
     */
    public function run(): void
    {
        // Creando el primer registro de profesor
        Professor::create([
            'id' => 1,
            'fullname' => 'Antonio Marin',
            'age' => 40,
            'gender' => 'male',
            'address' => 'calle falsa 123',
            'telephone' => '675662991',
            'email' => 'pamarin@iesfranciscodelosrios.es',
            'password' => Hash::make('password123')  // Agregar una contraseña segura
        ]);

        // Creando el segundo registro de profesor
        Professor::create([
            'id' => 2,
            'fullname' => 'Maria Lopez',
            'age' => 35,
            'gender' => 'female',
            'address' => 'avenida siempre viva 742',
            'telephone' => '612345678',
            'email' => 'mlopez@iesfranciscodelosrios.es',
            'password' => Hash::make('password123')  // Agregar una contraseña segura
        ]);

        // Creando el tercer registro de profesor
        Professor::create([
            'id' => 3,
            'fullname' => 'Juan Perez',
            'age' => 50,
            'gender' => 'male',
            'address' => 'calle del sol 456',
            'telephone' => '698765432',
            'email' => 'jperez@iesfranciscodelosrios.es',
            'password' => Hash::make('password123')  // Agregar una contraseña segura
        ]);

        // Creando el cuarto registro de profesor
        Professor::create([
            'id' => 4,
            'fullname' => 'Laura Sanchez',
            'age' => 28,
            'gender' => 'female',
            'address' => 'plaza mayor 789',
            'telephone' => '677889900',
            'email' => 'lsanchez@iesfranciscodelosrios.es',
            'password' => Hash::make('password123')  // Agregar una contraseña segura
        ]);
    }
}
