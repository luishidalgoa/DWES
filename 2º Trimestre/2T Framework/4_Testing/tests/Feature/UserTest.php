<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_get_users_list(): void
    {
        $response = $this->get('api/users');

        // Comprobamos que la respuesta sea 200
        $response->assertStatus(200);

        // Comprobamos que el contenido de la respuesta sea el esperado
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ],
        ]);

        // Comprobamos si nos devuelve un usuario con nombre 'Luis'
        $response->assertJsonFragment([
            'name' => 'Luis',
            'email' => 'dsreg@example.com'
        ]);

        // Comprobamos que el número de usuarios devueltos sea el esperado (ajustar según seeders)
        $expectedUserCount = 4; // Ajustar según los datos en la base de pruebas
        $response->assertJsonCount($expectedUserCount);
    }

    public function test_get_user_detail(): void
    {
        $userId = 1; // Assuming we are testing with user ID 1
        $response = $this->get("api/users/{$userId}");

        // Check that the response status is 200
        $response->assertStatus(200);

        // Check that the response has the expected structure
        //Ahora no es un array, si no que es solo un dato
        $response->assertJsonStructure([
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ]);

        // Check that the response contains the expected user data
        //Aquí comprobamos que el usuario con ID 1 se llame Antonio, no necesitamos contar el número de elementos
        $response->assertJsonFragment([
            'id' => $userId,
            'name' => 'Luis', // Assuming the user with ID 1 is named Antonio
            'email' => 'dsreg@example.com'
        ]);
    }

    //Hasta aquí, hemos visto HAPPY Path, es decir, todo funciona correctamente
    //Ahora vamos a ver cómo se comporta la aplicación cuando algo falla

    //Probamos qué ocurre cuando pedimos datos de un usuairo que no existe
    public function test_get_non_existing_user_detail(): void
    {
        $nonExistingUserId = 9999; // Assuming this user ID does not exist
        $response = $this->get("api/users/{$nonExistingUserId}");

        // Check that the response status is 404
        $response->assertStatus(404);
    }

    public function test_set_database_config(): void
    {
        Artisan::call('migrate:reset');
        Artisan::call('migrate');
        Artisan::call('db:seed');

        $response = $this->get('/');
        $response->assertStatus(200);

    }
}