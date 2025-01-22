<?php
class Formulario {
    private $campos = [];

    // Método para agregar campos al formulario
    public function agregarCampo($nombre, $tipo = "text", $label = "") {
        $this->campos[] = [
            'nombre' => $nombre,
            'tipo' => $tipo,
            'label' => $label
        ];
    }

    // Método para renderizar el formulario como HTML
    public function renderizar() {
        echo "<form method='post'>";

        foreach ($this->campos as $campo) {
            echo "<label>{$campo['label']}</label>";
            echo "<input type='{$campo['tipo']}' name='{$campo['nombre']}'><br><br>";
        }

        echo "<button type='submit'>Enviar</button>";
        echo "</form>";
    }
}

// Crear una instancia de la clase Formulario
$formulario = new Formulario();
$formulario->agregarCampo("nombre", "text", "Nombre:");
$formulario->agregarCampo("email", "email", "Email:");
$formulario->agregarCampo("edad", "number", "Edad:");

// Renderizar el formulario en el cliente
$formulario->renderizar();
?>