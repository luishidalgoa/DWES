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

    // Crear la tabla de productos (ropa) si no existe
    $db->exec("CREATE TABLE IF NOT EXISTS productos (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT NOT NULL,
                descripcion TEXT NOT NULL,
                precio DECIMAL(10, 2) NOT NULL,
                stock INTEGER NOT NULL
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


    // Insertar 10 productos de prueba si la tabla está vacía
$productosPrueba = [
    ['nombre' => 'Camiseta Básica', 'descripcion' => 'Camiseta de algodón, color blanca.', 'precio' => 9.99, 'stock' => 100],
    ['nombre' => 'Pantalón Deportivo', 'descripcion' => 'Pantalón cómodo para deporte, color negro.', 'precio' => 19.99, 'stock' => 50],
    ['nombre' => 'Chaqueta de Invierno', 'descripcion' => 'Chaqueta cálida, ideal para el frío.', 'precio' => 49.99, 'stock' => 30],
    ['nombre' => 'Zapatos de Cuero', 'descripcion' => 'Zapatos de cuero marrón, elegante y duradero.', 'precio' => 79.99, 'stock' => 20],
    ['nombre' => 'Sudadera con Capucha', 'descripcion' => 'Sudadera de algodón, color gris, con capucha.', 'precio' => 29.99, 'stock' => 75],
    ['nombre' => 'Gorra Deportiva', 'descripcion' => 'Gorra con visera, ideal para actividades al aire libre.', 'precio' => 12.99, 'stock' => 200],
    ['nombre' => 'Bufanda de Lana', 'descripcion' => 'Bufanda tejida a mano, color rojo.', 'precio' => 15.99, 'stock' => 150],
    ['nombre' => 'Guantes de Cuero', 'descripcion' => 'Guantes de cuero, ideales para el frío.', 'precio' => 25.99, 'stock' => 50],
    ['nombre' => 'Chaleco', 'descripcion' => 'Chaleco ligero, ideal para clima templado.', 'precio' => 18.99, 'stock' => 120],
    ['nombre' => 'Botas de Montaña', 'descripcion' => 'Botas resistentes para senderismo y trekking.', 'precio' => 89.99, 'stock' => 40]
];

    // Insertar productos solo si la tabla está vacía
    $stmt = $db->query("SELECT COUNT(*) AS total FROM productos");
    $row = $stmt->fetchArray();
    if ($row['total'] == 0) {
        foreach ($productosPrueba as $producto) {
            $stmt = $db->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)");
            $stmt->bindValue(':nombre', $producto['nombre']);
            $stmt->bindValue(':descripcion', $producto['descripcion']);
            $stmt->bindValue(':precio', $producto['precio']);
            $stmt->bindValue(':stock', $producto['stock']);
            $stmt->execute();
        }
    }

    echo "Base de datos y productos de prueba inicializados correctamente.";

} catch (Exception $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}
?>
