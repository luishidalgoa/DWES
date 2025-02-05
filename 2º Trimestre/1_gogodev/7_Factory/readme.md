# Uso de Seeders, Factories y Faker en Laravel

## 📌 Índice

1. [Introducción](#introducción)
2. [Configuración del Proyecto](#configuración-del-proyecto)
3. [Seeders: Poblando la Base de Datos](#seeders-poblando-la-base-de-datos)
4. [Factories: Generando Datos de Prueba](#factories-generando-datos-de-prueba)
5. [Faker: Simulación de Datos Realistas](#faker-simulación-de-datos-realistas)

---

## 1️⃣ Introducción

Cuando trabajamos con bases de datos en Laravel, necesitamos una forma eficiente de poblar tablas con datos iniciales y de prueba. Para esto, Laravel nos ofrece tres herramientas clave:

- **Seeders** → Insertan datos predefinidos en la base de datos.
- **Factories** → Permiten la creación de registros de forma automatizada y masiva.
- **Faker** → Genera datos falsos pero realistas para pruebas.

Estas herramientas facilitan la inicialización del sistema, asegurando que siempre haya datos disponibles para el desarrollo y pruebas.

---

## 2️⃣ Configuración del Proyecto

Creamos un nuevo proyecto en Laravel con:

```sh
composer create-project laravel/laravel my_database_project
cd my_database_project
```

Configuramos la base de datos en el archivo `.env`:

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=root
DB_PASSWORD=root
```

Ejecutamos las migraciones:

```sh
php artisan migrate
```

Ahora estamos listos para usar seeders, factories y Faker.

---

## 3️⃣ Seeders: Poblando la Base de Datos

Creamos un seeder para insertar datos iniciales:

```sh
php artisan make:seeder ProductSeeder
```

Editamos `database/seeders/ProductSeeder.php`:

```php
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {
    public function run() {
        Product::create([
            'name' => 'Producto Ejemplo',
            'short_description' => 'Descripción breve',
            'description' => 'Descripción más detallada del producto.',
            'price' => 50.00
        ]);
    }
}
```

Añadimos este seeder al `DatabaseSeeder.php`:

```php
public function run() {
    $this->call([
        ProductSeeder::class
    ]);
}
```

Ejecutamos el seeder:

```sh
php artisan db:seed
```

---

## 4️⃣ Factories: Generando Datos de Prueba

Para generar datos en masa, creamos un factory:

```sh
php artisan make:factory ProductFactory
```

Editamos `database/factories/ProductFactory.php`:

```php
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory {
    protected $model = Product::class;

    public function definition() {
        return [
            'name' => $this->faker->word,
            'short_description' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 500)
        ];
    }
}
```

Modificamos `ProductSeeder.php` para usar el factory:

```php
public function run() {
    Product::factory()->count(100)->create();
}
```

Ejecutamos de nuevo los seeders:

```sh
php artisan db:seed
```

---

## 5️⃣ Faker: Simulación de Datos Realistas

Laravel incluye Faker para generar datos realistas. Algunos ejemplos de su uso en Factories:

```php
return [
    'name' => fake()->company,
    'short_description' => fake()->catchPhrase,
    'description' => fake()->text(200),
    'price' => fake()->randomNumber(2)
];
```

Ejecutamos el seeder con datos realistas:

```sh
php artisan db:seed
```

---

## 🎯 Conclusión

Con Seeders, Factories y Faker podemos poblar nuestra base de datos de manera eficiente, asegurando datos realistas y variados para pruebas y desarrollo. ¡Listos para seguir construyendo en Laravel! 🚀
