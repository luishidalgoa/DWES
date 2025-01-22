<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Iniciar Sesión</h2>
<form action="procesar_login.php" method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario" required><br><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" value="Iniciar Sesión">
</form>

</body>
</html>
