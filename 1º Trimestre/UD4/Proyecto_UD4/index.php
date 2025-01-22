<?php
include 'controllers/reservaController.php';

$controller = new ReservaController($pdo);

$action = $_GET['action'] ?? 'index';

    switch ($action) {
        case 'crear':
            $controller->crear();
            break;
        case 'editar':
            $controller->editar();
            break;
        case 'eliminar':
            $controller->eliminar();
            break;
        default:
            $controller->index();
            break;
    }
?>