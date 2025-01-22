<?php
session_start();
require_once 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if (verificar_usuario($usuario, $password)) {
        $_SESSION['usuario'] = $usuario;
        setcookie('usuario', $usuario, time() + 3600);
        header('Location: index.php');
    } else {
        echo "<p>Usuario o contraseña incorrectos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Iniciar Sesión</h1>
<form method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario" required><br><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" value="Iniciar Sesión">
</form>

</body>
</html>