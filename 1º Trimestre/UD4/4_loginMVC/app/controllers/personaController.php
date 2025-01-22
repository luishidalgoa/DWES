<?php
require_once __DIR__ . '/../models/Persona.php';

class PersonaController {
    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $telefono = $_POST['telefono'] ?? '';

            $personaModel = new Persona();
            $persona = $personaModel->login($nombre, $telefono);

            if ($persona) {
                // Redirige al usuario si las credenciales son correctas
                header('Location: app/views/welcome.php');
                exit();
            } else {
                // En caso de error, muestra un mensaje
                $error = "Credenciales incorrectas.";
                require_once __DIR__ . '/../views/login.php';
            }
        } else {
            require_once __DIR__ . '/../views/login.php';
        }
    }
}
?>