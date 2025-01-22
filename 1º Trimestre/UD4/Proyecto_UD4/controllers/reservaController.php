<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../models/reserva.php';

class ReservaController {
    private $reservaModel;


    public function __construct($pdo) {
        $this->reservaModel = new Reserva($pdo);
    }
    /**
     * 
     * este es el metodo que se ejecutara desde index.php y sera el encargado de iniciar la vista de la reserva.
     * previamente a iniciar esa vista, habremos solicitado a la bbdd para obtener los datos de las reservas. y sean consumidas por la vista
     * @return void
     */
    public function index() {
        $reservas = $this->reservaModel->getAll(); // Obtiene las reservas de la base de datos.
        if (!$reservas) {
            $reservas = []; // Asegura que $reservas sea un array vacío si no hay datos.
        }
        //Llamamos a la vista
        include 'views/reserva/index.php';
    }
    
    
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_cliente = $_POST['id_cliente'] ?? null;
            $fecha_reserva = $_POST['fecha_reserva'] ?? null;
            $estado = isset($_POST['estado']) ? true : false ?? false;

            if ($id_cliente && $fecha_reserva) {
                $this->reservaModel->crear($id_cliente, $fecha_reserva, $estado);
                header("Location: index.php");
            } else {
                echo "Error: datos incompletos.";
            }
        }
    }
    

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $estado = 0;
            switch ($_POST['estado']) {
                case '0':
                    $estado = 0;
                    break;
                case '1':
                    $estado = 1;
                    break;
                default: 
                    $_POST['estado'] = 1;
            }

            $this->reservaModel->editar($_POST['id'], $_POST['id_cliente'], $_POST['fecha_reserva'], $estado);
            header("Location: index.php");
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->reservaModel->eliminar($_POST['id']);
            header("Location: index.php"); // header() redirige a la URL especificada
        }
    }
}
?>