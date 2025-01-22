<?php
class Reserva {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    /**
     * 
     * Devuleve todos las reservas existentes en la base de datos. mediante la conexion preestablecida (PDO) hacemos una query de todas las reservas
     * @return mixed
     */
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM reservas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Inserta un nuevo coche, construye una peticion POST a la base de datos con los parametros correspondientes
     * @param mixed $id_cliente
     * @param mixed $fecha_reserva
     * @param mixed $estado
     * @return void
     */
    public function crear($id_cliente, $fecha_reserva, $estado) {
        $stmt = $this->pdo->prepare("INSERT INTO reservas (id_cliente, fecha_reserva, estado) VALUES (:id_cliente, :fecha_reserva, :estado)");
        $stmt->execute([':id_cliente' => $id_cliente, ':fecha_reserva' => $fecha_reserva, ':estado' => $estado=='true' ? 1 : 0]);
    }    
    /**
     * 
     * Actualiza un coche, construye una peticion UPDATE a la base de datos con los parametros correspondientes
     * @param mixed $id
     * @param mixed $id_cliente
     * @param mixed $fecha_reserva
     * @param mixed $estado
     * @return void
     */
    public function editar($id, $id_cliente, $fecha_reserva, $estado) {
        $stmt = $this->pdo->prepare("UPDATE reservas SET id_cliente = :id_cliente, fecha_reserva = :fecha_reserva, estado = :estado WHERE id = :id");
        $stmt->execute([':id_cliente' => $id_cliente, ':fecha_reserva' => $fecha_reserva, ':estado' => $estado, ':id' => $id]);
    }
    /**
     * 
     * Elimina un coche, construye una peticion DELETE a la base de datos con los parametros correspondientes
     * @param mixed $id
     * @return void
     */
    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM reservas WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
    /**
     * 
     * Devuleve un coche, construye una peticion GET a la base de datos con los parametros correspondientes
     * @param mixed $id
     * @return mixed
     */
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM reservas WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}