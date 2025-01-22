<?php
/**
 * Conexión a una base de datos utilizando la clase PDO en PHP
 * BD persona, Tabla dwes
 */

try {
    // 1. CONEXIÓN CON LA BASE DE DATOS
    // Configuración de los parámetros de conexión: servidor, base de datos, usuario y contraseña
    $dsn = "mysql:host=localhost;dbname=DWES;charset=utf8"; // Data Source Name
    $username = "root";
    $password = "1234";

    // Crear instancia PDO
    $conexion = new PDO($dsn, $username, $password);

    // Configuramos el manejo de errores para que lance excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa.<br>";

} catch (PDOException $e) {
    // Capturamos errores de conexión
    echo "<br>Se ha producido un error: " . $e->getMessage();
    exit();
}

try {
    // 2. CONSULTA A LA BASE DE DATOS
    // Definimos la consulta SQL
    $consulta = "SELECT * FROM `persona`";

    // Preparamos la consulta (opcional pero recomendado con PDO)
    $stmt = $conexion->prepare($consulta);

    // Ejecutamos la consulta
    $stmt->execute();

    // 3. RECUPERAMOS LOS RESULTADOS
    // Verificamos si hay resultados
    if ($stmt->rowCount() > 0) {
        //OPCIÓN WHILE Recorremos LÍNEA A LÍNEA los resultados como un array asociativo
        /*while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
                ID: {$usuario['id']}<br>
                Nombre: {$usuario['nombre']}<br>
                Apellidos: {$usuario['apellidos']}<br>
                Teléfono: {$usuario['telefono']}<br>
                <hr>
            ";
        }*/

        // OPCIÓN FOREACH con FETCHALL  RECORREMOS CADA RESULTADO QUE NOS DEVUELVE EL SERVIDOR
        $usuarios = $stmt->fetchALL(PDO::FETCH_ASSOC);
        //print_r($usuarios);
        foreach ($usuarios as $usuario) {
            echo "
               ID: {$usuario['id']}<br>
                Nombre: {$usuario['nombre']}<br>
                Apellidos: {$usuario['apellidos']}<br>
                Teléfono: {$usuario['telefono']}<br>
                <hr>
            ";
        }
    } else {
        echo "No se encontraron registros.<br>";
    }

} catch (PDOException $e) {
    // Capturamos errores durante la ejecución de la consulta
    echo "<br>Error al realizar la consulta: " . $e->getMessage();
}

// 4. CERRAMOS LA CONEXIÓN (opcional en PDO, ya que se maneja automáticamente)
$conexion = null;
?>