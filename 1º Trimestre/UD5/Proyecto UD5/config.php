<?php
define("DB_NAME", "ud5_login2.db");

try {
    // Crear la base de datos si no existe
    $db = new SQLite3(DB_NAME);
    
    // Crear la tabla de usuarios si no existe
    $db->exec("CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                usuario TEXT NOT NULL,
                password TEXT NOT NULL
            )");

    // Crear la tabla de medicamentos (ropa) si no existe
    $db->exec("CREATE TABLE IF NOT EXISTS Medicamentos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        descripcion TEXT,
        precio REAL NOT NULL,
        stock INTEGER
            )");

    // Insertar un usuario admin por defecto si no existe
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindValue(':usuario', 'admin');
    $result = $stmt->execute();

    if ($result->fetchArray() === false) {
        $stmt = $db->prepare("INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)");
        $stmt->bindValue(':usuario', 'admin');
        $stmt->bindValue(':password', password_hash('admin', PASSWORD_DEFAULT)); // Contraseña segura
        $stmt->execute();
    }


    $medicamentosPrueba = [
        ['nombre' => 'Paracetamol', 'descripcion' => 'Paracetamol para el dolor de cabeza.', 'precio' => 9.99, 'stock' => 100],
        ['nombre' => 'Dalcon 500mg', 'descripcion' => 'Dalcon para el dolor de garganta.', 'precio' => 19.99, 'stock' => 50],
        ['nombre' => 'Jarabe de limon', 'descripcion' => 'Jarabe de limón para el dolor de garganta.', 'precio' => 49.99, 'stock' => 30],
        ['nombre' => 'Concerta', 'descripcion' => 'Concerta para el dolor de garganta.', 'precio' => 79.99, 'stock' => 20],
    ];
    // Insertar medicamentos solo si la tabla está vacía
    $stmt = $db->query("SELECT COUNT(*) AS total FROM medicamentos");
    $row = $stmt->fetchArray();
    if ($row['total'] == 0) {
        foreach ($medicamentosPrueba as $medicamento) {
            $stmt = $db->prepare("INSERT INTO medicamentos (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)");
            $stmt->bindValue(':nombre', $medicamento['nombre']);
            $stmt->bindValue(':descripcion', $medicamento['descripcion']);
            $stmt->bindValue(':precio', $medicamento['precio']);
            $stmt->bindValue(':stock', $medicamento['stock']);
            $stmt->execute();
        }
    }

    echo "Base de datos y medicamentos de prueba inicializados correctamente.";

} catch (Exception $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}
?>
