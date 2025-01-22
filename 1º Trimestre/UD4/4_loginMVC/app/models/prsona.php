<?php
require_once __DIR__ . '/../../config/database.php';

class Persona {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function login($nombre, $telefono) {
        try {
            $query = "SELECT * FROM persona WHERE nombre = :nombre AND telefono = :telefono";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un registro si lo encuentra
        } catch (PDOException $e) {
            die("Error al realizar la consulta: " . $e->getMessage());
        }
    }
}
?>