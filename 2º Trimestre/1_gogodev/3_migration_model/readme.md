# 3 Migraciones de modelos

Hemos hecho una migration en el proyecto modelData a Mysql donde hemos agregado columnas como:

```php
$table->string('title', 255);//varchar(100)
$table->string('description',255)->nullable();//text
$table->boolean('done')->default(false);//tinyint(1)
```


para levantarlo en la base de datos se debe ejecutar el comando:

```bash
php artisan migrate
```

para resetear la migración se debe ejecutar el comando:

```bash
php artisan migrate:reset
```
esto borrara todas las tablas de la base de datos.

### Creacion modelos
teoria: el modelo es una clase que se encarga de interactuar con la base de datos, es decir, es el encargado de hacer las consultas a la base de datos.

para crear un modelo se debe ejecutar el comando:

```bash
php artisan make:model Task --migration
```
--migration es para que se cree una migración de la bbdd al mismo tiempo que se crea el modelo.