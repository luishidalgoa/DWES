<?php
require('config.php');  // Asegúrate de que la conexión esté incluida

// Si el usuario no está logueado, lo redirigimos a login
if (!isset($_COOKIE['usuario'])) {
    header("Location: login.php");
    exit();
}

// Procesamos el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenemos los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Insertamos el medicamento en la base de datos
    $stmt = $db->prepare("INSERT INTO medicamentos (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)");
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':descripcion', $descripcion);
    $stmt->bindValue(':precio', $precio);
    $stmt->bindValue(':stock', $stock);

    if ($stmt->execute()) {
        // Si se inserta correctamente, redirigimos a la página de medicamentos
        header("Location: medicamentos.php");
        exit();
    } else {
        $error = "Error al agregar el medicamento";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar medicamento</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Agregar medicamento</h2>
    <a href="medicamentos.php">Volver a medicamentos</a>
    <br><br>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea><br><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required><br><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required><br><br>

        <input type="submit" value="Agregar medicamento">
    </form>
</body>
</html>
