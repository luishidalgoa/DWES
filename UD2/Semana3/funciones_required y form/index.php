<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Suma</title>
</head>
<body>
    <h1>Formulario de Suma</h1>
    <form action="procesar.php" method="POST">
        <label for="sumando1">Sumando 1</label>
        <input type="text" name="sumando1" id="sumando1">
        <br>
        <label for="sumando2">Sumando 2</label>
        <input type="text" name="sumando2" id="sumando2">
        <br>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>
