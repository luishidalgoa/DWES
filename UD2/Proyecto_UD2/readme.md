# Sistema de Reservas de Bicicletas

Este proyecto es un sistema de reservas de bicicletas desarrollado en PHP. Permite a los usuarios reservar bicicletas en diferentes ciudades y ver un historial de reservas almacenado en la sesión.

## Características Implementadas

### Estructuras de Programación
1. **Sentencias Condicionales**:
   - Se utiliza una estructura de control `if` para verificar si existen reservas previas almacenadas en la sesión y si el formulario ha sido enviado mediante un `POST`.
   - Se emplea `isset` para verificar la existencia de variables en diferentes momentos, por ejemplo, al inicializar el array de reservas.

2. **Bucles**:
   - Se utiliza `foreach` para recorrer el array de reservas almacenado en la sesión y deserializar cada elemento en objetos PHP.

3. **Uso de Arrays**:
   - Se utiliza un array `$bicicletasArray` para almacenar objetos de reservas deserializados.
   - El array `$_SESSION['reservas']` almacena las reservas serializadas, permitiendo su persistencia en la memoria de sesión entre diferentes accesos a la aplicación.

### Funciones
1. **Funciones Personalizadas**:
   - `calculatePrice($bicycle)`: Calcula el precio de la reserva de la bicicleta en función de la duración y el tipo de bicicleta.
   - `processForm()`: Procesa los datos del formulario para instanciar nuevos objetos de reserva y almacenarlos en la sesión.

2. **Funciones Nativas de PHP**:
   - `isset()`: Se utiliza para verificar la existencia de variables en varios momentos, asegurando que no se intente acceder a datos no inicializados.
   - `in_array()`: Permite verificar si una reserva ya existe en la sesión, evitando así la duplicación de datos.
   - `serialize()` y `unserialize()`: Permiten la serialización de objetos `Data` y `Bicycle` para su almacenamiento en la sesión y recuperación.

### Formularios Web
   - Se ha creado un formulario en HTML para que los usuarios puedan ingresar los datos de reserva. El formulario usa el método `POST` y envía la información a `tablaReservas.php`, donde se procesan los datos y se agrega la reserva a la sesión.

### Recuperación de Información
   - Los datos del formulario se manejan mediante `$_POST`, permitiendo recibir y procesar datos del usuario para crear y almacenar una nueva reserva.

### Funciones de Fecha
   - Se utiliza la clase `DateTime` de PHP para gestionar las fechas de reserva y vencimiento de la bicicleta.
   - Al mostrar las fechas en la tabla de reservas, se formatean mediante el método `format` de la clase `DateTime` en formato `Y-m-d`.

### Uso de la Sesión
   - Se emplea la memoria de sesión (`$_SESSION`) para almacenar las reservas, permitiendo que los datos persistan durante la sesión de usuario.
   - Almacenamos objetos serializados en `$_SESSION['reservas']` para que las reservas sean recuperables entre las distintas visitas a la página sin necesidad de una base de datos.

### Comentarios en el Código
   - Se han incluido comentarios en el código para explicar la funcionalidad de cada sección, haciendo el código más claro y fácil de mantener.

## Estructura del Proyecto
- **models/objects.php**: Contiene las clases `Bicycle` y `Data` que definen los objetos usados en el sistema de reservas.
- **tablaReservas.php**: Controlador principal que procesa las reservas enviadas por el formulario y las muestra en una tabla.
- **functions.php**: Archivo que contiene funciones auxiliares, como el cálculo de precios.

## Instalación y Uso
1. Clonar el repositorio en tu entorno local.
2. Asegurarse de tener un servidor web con soporte para PHP, como Apache o Nginx.
3. Colocar los archivos en el directorio de raíz de tu servidor y acceder a `tablaReservas.php` en el navegador para comenzar a interactuar con la aplicación.

## Requerimientos
- PHP 7.4 o superior.
- Servidor web con soporte PHP.

Este sistema de reservas demuestra el uso de estructuras de programación PHP, manejo de formularios, manipulación de sesiones, y buenas prácticas en la reutilización de código mediante funciones personalizadas.
