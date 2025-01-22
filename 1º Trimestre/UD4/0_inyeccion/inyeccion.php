<?php
// Crear una base de datos SQLite en un archivo
$db = new SQLite3('test.db');

// Crear una tabla 'usuarios' de ejemplo
$db->exec("CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY, nombre TEXT, contraseña TEXT)");

// Insertar datos de ejemplo
$db->exec("INSERT INTO usuarios (nombre, contraseña) VALUES ('admin', 'admin123')");
$db->exec("INSERT INTO usuarios (nombre, contraseña) VALUES ('Pepito', 'password1')");
$db->exec("INSERT INTO usuarios (nombre, contraseña) VALUES ('Manolita', 'password1')");

// Simulación de una entrada del usuario
echo "Simulación de inyección SQL:\n<br>";
$usuario = "admin";
$contrasena = "' OR '1'='1";

// Consulta insegura que es vulnerable a inyección SQL
$query = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND contraseña = '$contrasena'";
echo "Consulta ejecutada: $query\n<br>";

// Ejecutar la consulta
$resultado = $db->query($query);

// Mostrar los resultados
while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
    echo "ID: {$fila['id']} - Nombre: {$fila['nombre']} - Contraseña: {$fila['contraseña']}\n<br>";
}
?>