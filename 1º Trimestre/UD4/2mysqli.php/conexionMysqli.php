<?php
// 1. CONEXIÓN con la BBDD:
// "SERVIDOR", "USUARIO", "CONTRASEÑA", "BASE DE DATOS"

try {
    $conexion = mysqli_connect("localhost", "root", "1234", "DWES");
} catch (Exception $e) {
    echo "<br> 1. Se ha producido el siguiente error: " . $e->getMessage();
    echo "<br> 2. Falló la conexión: " . mysqli_connect_error();
    exit();
}

// 3. CONSULTA A LA BASE DE DATOS
$consulta = "SELECT * FROM `persona`";
$listaUsuarios = mysqli_query($conexion, $consulta);

// 4. COMPROBAMOS SI EL SERVIDOR NOS HA DEVUELTO RESULTADOS
if ($listaUsuarios) {

    // RECORREMOS CADA RESULTADO QUE NOS DEVUELVE EL SERVIDOR
    foreach ($listaUsuarios as $usuario) {
        echo "
            $usuario[id]
            $usuario[nombre]
            $usuario[apellidos]
            $usuario[telefono]
            <br>
        ";
    }
}
?>