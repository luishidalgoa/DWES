<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>
<body>

<h1>Bienvenido al Sistema Web</h1>

<?php if (isset($_SESSION['usuario'])): ?>
    <p>Hola, <?= htmlspecialchars($_SESSION['usuario']) ?>. <a href="logout.php">Cerrar sesión</a></p>
<?php else: ?>
    <p><a href="login.php">Iniciar sesión</a></p>
<?php endif; ?>

<p><a href="productos.php">Productos</a></p>
<p><a href="contacto.php">Contacto</a></p>

</body>
</html>