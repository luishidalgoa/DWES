<?php
require('config.php');

if (!isset($_COOKIE['usuario'])) {
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $stmt = $db->prepare("UPDATE medicamentos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock WHERE id = :id");
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':descripcion', $descripcion);
    $stmt->bindValue(':precio', $precio);
    $stmt->bindValue(':stock', $stock);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header("Location: medicamentos.php");
}

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM medicamentos WHERE id = :id");
$stmt->bindValue(':id', $id);
$result = $stmt->execute();
$medicamento = $result->fetchArray();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar medicamento</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Editar medicamento</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $medicamento['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($medicamento['nombre']); ?>" required>
        <br><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" value="<?php echo htmlspecialchars($medicamento['descripcion']); ?>" required>
        <br><br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?php echo $medicamento['precio']; ?>" required>
        <br><br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?php echo $medicamento['stock']; ?>" required>
        <br><br>
        <input type="submit" value="Actualizar medicamento">
    </form>
</body>
</html>
