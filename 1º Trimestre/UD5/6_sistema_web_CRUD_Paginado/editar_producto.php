<?php
session_start();
require('config.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $stmt = $db->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock WHERE id = :id");
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':descripcion', $descripcion);
    $stmt->bindValue(':precio', $precio);
    $stmt->bindValue(':stock', $stock);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header("Location: productos.php");
}

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM productos WHERE id = :id");
$stmt->bindValue(':id', $id);
$result = $stmt->execute();
$producto = $result->fetchArray();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Editar Producto</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
        <br><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" value="<?php echo htmlspecialchars($producto['descripcion']); ?>" required>
        <br><br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" required>
        <br><br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required>
        <br><br>
        <input type="submit" value="Actualizar Producto">
    </form>
</body>
</html>
