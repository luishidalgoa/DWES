<?php
require('config.php');  // Asegúrate de incluir la conexión

// Si el usuario no está logueado, lo redirigimos a login
if (!isset($_COOKIE['usuario'])) {
    header("Location: login.php");
    exit();
}

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$itemsPorPagina = 5;
$offset = ($pagina - 1) * $itemsPorPagina;

// Obtener los medicamentos
$stmt = $db->prepare("SELECT * FROM medicamentos LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $itemsPorPagina, SQLITE3_INTEGER);
$stmt->bindValue(':offset', $offset, SQLITE3_INTEGER);
$result = $stmt->execute();

$medicamentos = [];
while ($row = $result->fetchArray()) {
    $medicamentos[] = $row;
}

// Contar total de medicamentos para la paginación
$stmt = $db->query("SELECT COUNT(*) as total FROM medicamentos");
$totalmedicamentos = $stmt->fetchArray()['total'];
$totalPaginas = ceil($totalmedicamentos / $itemsPorPagina);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Medicamentos</title>
    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Medicamentos</h2>
    <a href="logout.php">Cerrar sesión</a>
    <br><br>

    <a href="agregar_medicamento.php">Agregar Medicamento</a>
    <br><br>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($medicamentos as $medicamento): ?>
            <tr>
                <td><?php echo htmlspecialchars($medicamento['nombre']); ?></td>
                <td><?php echo htmlspecialchars($medicamento['descripcion']); ?></td>
                <td><?php echo $medicamento['precio']; ?></td>
                <td><?php echo $medicamento['stock']; ?></td>
                <td>
                    <a href="editar_medicamento.php?id=<?php echo $medicamento['id']; ?>">Editar</a>
                    <a href="eliminar_medicamento.php?id=<?php echo $medicamento['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <div>
        <p>Páginas:</p>
        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="medicamentos.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
