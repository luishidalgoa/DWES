<?php

// Define el espacio de nombres para el seeder CompanysSeeder
namespace Database\Seeders;

// Importa las clases necesarias del framework Laravel
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

// Define la clase CompanysSeeder que extiende la clase base Seeder
class CompanysSeeder extends Seeder
{
    /**
     * Ejecuta las semillas de la base de datos.
     */
    public function run(): void
    {
        // Crea una nueva compañía con los datos especificados
        Company::create([
            'id' => 1,
            'name' => 'Infrico',
            'address' => 'Los Piedros – Las Navas, s/n, 14900 Lucena, Córdoba',
            'telephone' => '957513068',
            'email' => 'depcomercial@infrico.com',
            'date_creation' => '1986-01-01'
        ]);

        // Crea una nueva compañía con los datos especificados
        Company::create([
            'id' => 2,
            'name' => 'TechCorp',
            'address' => '123 Tech Street, Silicon Valley, CA',
            'telephone' => '1234567890',
            'email' => 'info@techcorp.com',
            'date_creation' => '2000-05-15'
        ]);

        // Crea una nueva compañía con los datos especificados
        Company::create([
            'id' => 3,
            'name' => 'HealthPlus',
            'address' => '456 Health Ave, New York, NY',
            'telephone' => '0987654321',
            'email' => 'contact@healthplus.com',
            'date_creation' => '2010-09-23'
        ]);

        // Crea una nueva compañía con los datos especificados
        Company::create([
            'id' => 4,
            'name' => 'EduTech',
            'address' => '789 Education Blvd, Boston, MA',
            'telephone' => '1122334455',
            'email' => 'support@edutech.com',
            'date_creation' => '2015-11-11'
        ]);
    }
}