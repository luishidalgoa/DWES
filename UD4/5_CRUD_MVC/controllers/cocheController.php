<?php
include 'db.php';
include 'models/Coche.php';

class CocheController {
    private $cocheModel;

    public function __construct($pdo) {
        $this->cocheModel = new Coche($pdo);
    }

    public function index() {
        $coches = $this->cocheModel->getAll();
        include 'views/coches/index.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cocheModel->crear($_POST['marca'], $_POST['modelo'], $_POST['anio']);
            header("Location: index.php");
        }
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cocheModel->editar($_POST['id'], $_POST['marca'], $_POST['modelo'], $_POST['anio']);
            header("Location: index.php");
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cocheModel->eliminar($_POST['id']);
            header("Location: index.php");
        }
    }
}
?>