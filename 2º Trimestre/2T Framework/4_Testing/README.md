# Resumen del Proyecto de Testing en Laravel

## Introducción

El proyecto se ha centrado en la creación de pruebas (tests) en un proyecto Laravel para asegurar la calidad del código. El objetivo es implementar pruebas unitarias e integrales para verificar el comportamiento del sistema.

## Creación de Tests

### Test Unitarios
- Se enfocan en verificar funciones o métodos individuales.
- Ejemplo: Verificación de un controlador usando principios SOLID.

### Test de Integración
- Se enfocan en probar el sistema en su totalidad, verificando que las rutas, vistas y datos se manejen correctamente.

### TDD (Test-Driven Development)
- **Antes del Desarrollo**: Los tests se escriben primero y luego se desarrolla el código.
- **Después del Desarrollo**: Los tests se crean antes de cada commit para verificar el correcto funcionamiento de la aplicación.

### Entorno de Testing
- **PHPUnit**: Framework principal utilizado en Laravel para ejecutar las pruebas.
- **Bases de datos en memoria**: Utilización de seeder/factories y un entorno especial para testing para evitar modificar datos reales.

## Pasos Realizados

1. **Creación del Proyecto**:
   - Usamos el comando `composer create-project laravel/laravel testexample` para iniciar el proyecto.
   - La base de datos `users` está lista para realizar pruebas.

2. **Creación de Tests**:
   - Utilizamos `php artisan make:test` para crear nuestros tests.
   - Los tests se pueden clasificar en **Feature Tests** (pruebas de integración) y **Unit Tests** (pruebas unitarias).

3. **Primer Test (Feature Test)**:
   - Se verifica que la ruta principal (`/`) retorne un estado 200.
   - Código de ejemplo:
     ```php
     public function test_the_application_returns_a_successful_response(): void
     {
         $response = $this->get('/');
         $response->assertStatus(200);
     }
     ```

4. **Test de Lista de Usuarios**:
   - Se verifica que la ruta `/users` devuelva un listado de usuarios con la estructura y datos correctos.
   - Comprobaciones realizadas:
     - Estado 200 (`assertStatus`).
     - Estructura JSON esperada (`assertJsonStructure`).
     - Verificación de que un usuario específico, como Antonio, esté presente (`assertJsonFragment`).
     - Verificación del número de usuarios (`assertJsonCount`).

5. **Test de Detalles de un Usuario**:
   - Se prueba que la ruta `/users/{id}` devuelva los detalles correctos de un usuario específico.
   - Se verifica la estructura de la respuesta y los datos correctos.

6. **Test de Usuario No Existente**:
   - Se simula una petición a un usuario que no existe para verificar que el sistema responda con un error 404.
   - Código de ejemplo:
     ```php
     public function test_get_non_existing_user_detail(): void
     {
         $nonExistingUserId = 9999;
         $response = $this->get("/users/{$nonExistingUserId}");
         $response->assertStatus(404);
     }
     ```
