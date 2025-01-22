<?php
session_start(); // Iniciar sesión
$db_file = 'ud5_login2.db';

try {
    // Conectar a la base de datos SQLite
    $db = new PDO("sqlite:" . $db_file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener los datos del formulario
    $usuario = htmlentities($_POST['usuario']);
    $password = htmlentities($_POST['password']);

    // Buscar el usuario en la base de datos
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindValue(':usuario', $usuario);
    $stmt->execute();

    // Comprobar si el usuario existe
    if ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Verificar la contraseña
        if (password_verify($password, $fila['password'])) {
            echo "<h2>¡Bienvenido, $usuario!</h2>";
            $_SESSION['usuario'] = $usuario;
            header("Location: usuarios_registrados.php");
        } else {
            echo "<h3>Contraseña incorrecta. <a href='index.php'>Volver a intentar</a></h3>";
        }
    } else {
        echo "<h3>Usuario no encontrado. <a href='index.php'>Volver a intentar</a></h3>";
    }
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>