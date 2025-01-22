<?php
// Ruta y nombre de la base de datos SQLite
$db_file = 'ud5_login2.db';

try {
    // Conexión a la base de datos SQLite
    $db = new PDO("sqlite:" . $db_file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la tabla usuarios si no existe
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                usuario TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL
            )";
    $db->exec($sql);

    // Insertar un usuario inicial (si no existe)
    $usuario = 'admin';
    $password = password_hash('admin', PASSWORD_DEFAULT); // Encriptar la contraseña
    $stmt = $db->prepare("INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)");
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':password', $password);
    $stmt->execute();

    echo "Base de datos creada y usuario inicial insertado.";

} catch (PDOException $e) {
    die("Error al crear la base de datos: " . $e->getMessage());
}
?>