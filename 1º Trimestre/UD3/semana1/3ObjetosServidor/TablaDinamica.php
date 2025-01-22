<?php
class Tabla {
    private $datos;

    // Constructor para inicializar los datos de la tabla
    public function __construct($datos) {
        $this->datos = $datos;
    }

    // Método para renderizar la tabla
    public function renderizar() {
        echo "<table border='1'>";

        // Encabezado de la tabla
        echo "<tr>";
        foreach (array_keys($this->datos[0]) as $header) {
            echo "<th>$header</th>";
        }
        echo "</tr>";

        // Filas de datos
        foreach ($this->datos as $fila) {
            echo "<tr>";
            foreach ($fila as $dato) {
                echo "<td>$dato</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }
}

// Datos para la tabla
$datos = [
    ['Nombre' => 'Juan', 'Edad' => 25, 'Ciudad' => 'Madrid'],
    ['Nombre' => 'María', 'Edad' => 30, 'Ciudad' => 'Barcelona'],
    ['Nombre' => 'Pedro', 'Edad' => 22, 'Ciudad' => 'Valencia']
];

// Crear una instancia de la clase Tabla y renderizarla
$tabla = new Tabla($datos);
$tabla->renderizar();
?>