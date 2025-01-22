<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivo</title>
</head>
<body>
    <h1>Subir un archivo</h1>
    <form action="subir.php" method="POST" enctype="multipart/form-data">
        <label for="archivo">Selecciona un archivo para subir:</label>
        <input type="file" name="archivo" id="archivo" required><br><br>
        <input type="submit" value="Subir Archivo">
    </form>
</body>
</html>