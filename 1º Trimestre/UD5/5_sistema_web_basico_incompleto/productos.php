<?php
require_once 'funciones.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Manejo de CRUD (pendiente de implementación)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>

<h1>Productos</h1>
<a href="index.php">Inicio</a>
echo "Aquí podrás gestionar tus productos.";

</body>
</html>