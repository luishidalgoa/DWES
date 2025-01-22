<?php
include 'controllers/CocheController.php';

$controller = new CocheController($pdo);

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