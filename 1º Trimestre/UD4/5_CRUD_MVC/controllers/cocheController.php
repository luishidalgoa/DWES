<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../models/Coche.php';

class CocheController {
    private $cocheModel;


    public function __construct($pdo) {
        $this->cocheModel = new Coche($pdo);
    }

    public function index() {
        $coches = $this->cocheModel->getAll(); // Obtiene los coches de la base de datos.
        if (!$coches) {
            $coches = []; // Asegura que $coches sea un array vacío si no hay datos.
        }
        include 'views/coche/index.php';
    }
    

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $marca = $_POST['marca'] ?? null;
            $modelo = $_POST['modelo'] ?? null;
            $anio = $_POST['anio'] ?? null;
    
            if ($marca && $modelo && $anio) {
                $this->cocheModel->crear($marca, $modelo, $anio);
                header("Location: index.php");
            } else {
                echo "Error: datos incompletos.";
            }
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