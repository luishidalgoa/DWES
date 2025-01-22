<?php
// Ruta de la base de datos SQLite
$db_file = 'sistema_web.db';

try {
    // Conectar o crear la base de datos SQLite
    $db = new PDO("sqlite:" . $db_file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear tabla usuarios
    $db->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        usuario TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL
    )");

    // Crear tabla productos
    $db->exec("CREATE TABLE IF NOT EXISTS productos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        descripcion TEXT,
        precio REAL NOT NULL
    )");

    // Insertar 5 usuarios por defecto (incluyendo admin)
    $usuarios = [
        ['admin', password_hash('admin', PASSWORD_DEFAULT)],
        ['user1', password_hash('user1', PASSWORD_DEFAULT)],
        ['user2', password_hash('user2', PASSWORD_DEFAULT)],
        ['user3', password_hash('user3', PASSWORD_DEFAULT)],
        ['user4', password_hash('user4', PASSWORD_DEFAULT)]
    ];

    foreach ($usuarios as $usuario) {
        $stmt = $db->prepare("INSERT OR IGNORE INTO usuarios (usuario, password) VALUES (?, ?)");
        $stmt->execute($usuario);
    }

    echo "Base de datos creada con éxito.";

} catch (PDOException $e) {
    die("Error al crear la base de datos: " . $e->getMessage());
}
?>