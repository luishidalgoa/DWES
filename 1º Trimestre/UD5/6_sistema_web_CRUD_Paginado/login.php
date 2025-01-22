<?php
session_start();
require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindValue(':usuario', $usuario);
    $result = $stmt->execute();
    $user = $result->fetchArray();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: productos.php");
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
