<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creamos 4 usuario uno se debe llamar Antonio
       User::factory()->create([
            'name' => 'Luis',
            'email'=>'dsreg@example.com'
        ]);
       User::factory(3)->create();
    }
}
