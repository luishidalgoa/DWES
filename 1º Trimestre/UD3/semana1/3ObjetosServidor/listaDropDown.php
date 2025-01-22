<?php
class Select {
    private $opciones;

    // Constructor para inicializar las opciones
    public function __construct($opciones) {
        $this->opciones = $opciones;
    }

    // Método para renderizar el select
    public function renderizar($nombre) {
        echo "<label for='$nombre'>Seleccione una opción:</label>";
        echo "<select name='$nombre' id='$nombre'>";

        foreach ($this->opciones as $valor => $etiqueta) {
            echo "<option value='$valor'>$etiqueta</option>";
        }

        echo "</select>";
    }
}

// Opciones para el select
$opciones = [
    'es' => 'Español',
    'en' => 'Inglés',
    'fr' => 'Francés'
];

// Crear una instancia de la clase Select y renderizarla
$select = new Select($opciones);
$select->renderizar("idioma");
?>