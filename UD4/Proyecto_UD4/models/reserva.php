<?php
class Reserva {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM reservas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function crear($id_cliente, $fecha_reserva, $estado) {
        $stmt = $this->pdo->prepare("INSERT INTO reservas (id_cliente, fecha_reserva, estado) VALUES (:id_cliente, :fecha_reserva, :estado)");
        $stmt->execute([':id_cliente' => $id_cliente, ':fecha_reserva' => $fecha_reserva, ':estado' => $estado]);
    }    

    public function editar($id, $id_cliente, $fecha_reserva, $estado) {
        $stmt = $this->pdo->prepare("UPDATE reservas SET id_cliente = :id_cliente, fecha_reserva = :fecha_reserva, estado = :estado WHERE id = :id");
        $stmt->execute([':id_cliente' => $id_cliente, ':fecha_reserva' => $fecha_reserva, ':estado' => $estado, ':id' => $id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM reservas WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM reservas WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}