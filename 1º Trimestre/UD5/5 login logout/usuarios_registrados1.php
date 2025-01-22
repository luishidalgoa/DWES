<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona de Usuarios Registrados</title>
    <!-- Enlace a PicoCSS -->
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <!-- Enlace a estilos.css -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><strong>Bienvenido, <?php session_start(); echo $_SESSION["usuario"] ?? "Invitado"; ?></strong></li>
            <li><a href="logout.php" class="contrast">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>

<main>
<?php
// Verificar si el usuario ha iniciado sesión, si no redirigir al login
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>

    <article>
        <h1>Información General</h1>
        <p>Bienvenido, <strong><?php echo $_SESSION["usuario"]; ?></strong>. Esta es tu zona personal de usuario.</p>

        <section class="session-details">
            <h2>Detalles de la Sesión</h2>
            <ul>
                <?php foreach ($_SESSION as $key => $value): ?>
                    <li><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="navigation">
            <h3>Navegación</h3>
            <p>Pulse <a href="usuarios_registrados.php">aquí</a> para volver al menú de usuarios registrados.</p>
            <p>Volver al <a href="login.php">inicio</a></p>
        </section>
    </article>
</main>

<footer>
    <p>Pulse <a href="logout.php" class="contrast">aquí</a> para cerrar sesión.</p>
</footer>

</body>
</html>
