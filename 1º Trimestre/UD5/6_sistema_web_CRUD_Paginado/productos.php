<?php
session_start();
require('config.php');  // Asegúrate de incluir la conexión

// Si el usuario no está logueado, lo redirigimos a login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$itemsPorPagina = 5;
$offset = ($pagina - 1) * $itemsPorPagina;

// Obtener los productos
$stmt = $db->prepare("SELECT * FROM productos LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $itemsPorPagina, SQLITE3_INTEGER);
$stmt->bindValue(':offset', $offset, SQLITE3_INTEGER);
$result = $stmt->execute();

$productos = [];
while ($row = $result->fetchArray()) {
    $productos[] = $row;
}

// Contar total de productos para la paginación
$stmt = $db->query("SELECT COUNT(*) as total FROM productos");
$totalProductos = $stmt->fetchArray()['total'];
$totalPaginas = ceil($totalProductos / $itemsPorPagina);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Productos</h2>
    <a href="logout.php">Cerrar sesión</a>
    <br><br>

    <a href="agregar_producto.php">Agregar Producto</a>
    <br><br>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['stock']; ?></td>
                <td>
                    <a href="editar_producto.php?id=<?php echo $producto['id']; ?>">Editar</a>
                    <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <div>
        <p>Páginas:</p>
        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="productos.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
