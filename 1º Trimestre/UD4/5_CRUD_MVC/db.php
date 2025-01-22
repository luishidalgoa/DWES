<?php
    $host = 'localhost';
    $db = 'DWES';
    $user = 'root'; // Cambia esto según tu configuración
    $pass = '1234'; // Cambia esto según tu configuración

    /*  code that may potentially throw an exception, and if an exception is thrown within the `try` block, it can be caught and handled in the `catch` block. In the provided code snippet, the database connection
    code is wrapped in a `try` block to catch any potential `PDOException` exceptions that may occur during the connection process. 
    If an exception is thrown, the code inside the `catch` block will
    be executed to handle the error. */
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
    
?>