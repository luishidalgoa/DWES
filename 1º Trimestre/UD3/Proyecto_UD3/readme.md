# Sistema de Reservas de Bicicletas

Este proyecto es un sistema de reservas de bicicletas desarrollado en PHP. Permite a los usuarios reservar bicicletas en diferentes ciudades y ver un historial de reservas almacenado en la sesión.

## Características Implementadas

- Modelo vista - controlador
- Gestión de sesiones
- Formularios
- Clases
- namespace

## Estructura del Proyecto
```
├── src/
│   ├── Controllers/
│   |   ├── reservarController.php
│   |   ├── verReservas.php
│   ├── Models/
|   |   ├── bicicleta.php
|   |   ├── cliente.php
│   ├── Views/
│   |   ├── index.php
│   |   ├── verReservas.php
|   └── utils
|       ├── functions.php
├── README.md
```

## Instalación y Uso
1. Clonar el repositorio en tu entorno local.
2. Asegurarse de tener un servidor web con soporte para PHP, como Apache o Nginx.
3. Colocar los archivos en el directorio de raíz de tu servidor y acceder a `tablaReservas.php` en el navegador para comenzar a interactuar con la aplicación.

## Requerimientos
- PHP 7.4 o superior.
- Servidor web con soporte PHP.

Este sistema de reservas demuestra el uso de estructuras de programación PHP, manejo de formularios, manipulación de sesiones, y buenas prácticas en la reutilización de código mediante funciones personalizadas.
