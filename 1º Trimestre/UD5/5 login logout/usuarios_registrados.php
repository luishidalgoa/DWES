<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona de Usuarios Registrados</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>Zona de Usuarios Registrados</h1>
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
        <section>
            <h2>¡Hola, <?php echo $_SESSION["usuario"]; ?>!</h2>
            <p>Esta es tu zona personal. Aquí puedes acceder a contenido exclusivo.</p>
        </section>

        <section class="session-details">
            <h3>Detalles de la Sesión</h3>
            <ul>
                <?php foreach ($_SESSION as $key => $value): ?>
                    <li><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section>
            <h3>Navegación</h3>
            <ol>
                <li><a href="usuarios_registrados1.php">Página 1: Información General</a></li>
                <li><a href="usuarios_registrados2.php">Página 2: Recursos Exclusivos</a></li>
                <li><a href="usuarios_registrados3.php">Página 3: Contacto con Soporte</a></li>
            </ol>

            <p>Volver al <a href="usuarios_registrados.php">Menú de Usuarios Registrados</a></p>
            <p>Ir a la <a href="login.php">Página de Inicio</a></p>
        </section>
    </article>
</main>

<footer>
    <p>Pulse <a href="logout.php" class="contrast">aquí</a> para cerrar sesión y proteger su cuenta.</p>
</footer>

</body>
</html>
