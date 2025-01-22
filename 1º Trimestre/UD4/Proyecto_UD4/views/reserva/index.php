<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de reservas</title>
</head>
<body>
    <h1>Gestión de reservas</h1>

    <form method="POST" action="index.php?action=crear">
        <input type="hidden" name="id" value="<?= isset($reserva) ? $reserva['id'] : '' ?>">
        <label>ID_Cliente: <input type="text" name="id_cliente" required></label><br>
        <label>Fecha reserva: <input type="text" name="fecha_reserva" required></label><br>
        <label>estado: <input type="checkbox" name="estado"></label><br>
        <button type="submit">Añadir Reserva</button>
    </form>

    <h2>Lista
    <h2>Lista de reservas</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID_Cliente</th>
            <th>Fecha reserva</th>
            <th>estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($reservas as $reserva): ?>
        <tr>
            <td><?= $reserva['id'] ?></td>
            <td><?= $reserva['id_cliente'] ?></td>
            <td><?= $reserva['fecha_reserva'] ?></td>
            <td><?= $reserva['estado'] ? 'true' : 'false' ?></td>
            <td>
                <form method="POST" action="index.php?action=editar" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $reserva['id'] ?>">
                    <input type="text" name="id_cliente" value="<?= $reserva['id_cliente'] ?>" required>
                    <input type="text" name="fecha_reserva" value="<?= $reserva['fecha_reserva'] ?>" required>
                    <input type="number" placeholder="introduce 1 = true o 0 = false" name="estado" value="<?= $reserva['estado'] ?>" required>
                    <button type="submit">Actualizar</button>
                </form>
                <form method="POST" action="index.php?action=eliminar" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $reserva['id'] ?>">
                    <button type="submit">Eliminar</button>
                </form>

            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>