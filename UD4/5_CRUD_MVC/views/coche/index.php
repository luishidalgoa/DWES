<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Coches</title>
</head>
<body>
    <h1>Gestión de Coches</h1>

    <form method="POST" action="index.php?action=crear">
        <input type="hidden" name="id" value="<?= isset($coche) ? $coche['id'] : '' ?>">
        <label>Marca: <input type="text" name="marca" required></label><br>
        <label>Modelo: <input type="text" name="modelo" required></label><br>
        <label>Año: <input type="number" name="anio" required></label><br>
        <button type="submit">Añadir Coche</button>
    </form>

    <h2>Lista
    <h2>Lista de Coches</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($coches as $coche): ?>
        <tr>
            <td><?= $coche['id'] ?></td>
            <td><?= $coche['marca'] ?></td>
            <td><?= $coche['modelo'] ?></td>
            <td><?= $coche['anio'] ?></td>
            <td>
                <form method="POST" action="index.php?action=editar" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $coche['id'] ?>">
                    <input type="text" name="marca" value="<?= $coche['marca'] ?>" required>
                    <input type="text" name="modelo" value="<?= $coche['modelo'] ?>" required>
                    <input type="number" name="anio" value="<?= $coche['anio'] ?>" required>
                    <button type="submit">Actualizar</button>
                </form>
                <form method="POST" action="../../controllers/cocheController.php" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $coche['id'] ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>