<?php
class Persona {
    // Propiedades
    public string $nombre;

    // Método constructor
    public function __construct() {
    }

    // Método
    public function saludar() {
        return "Hola, mi nombre es $this->nombre\n<br>";
    }

    public function imprimir() {
        echo $this->saludar();
    }

    public function setNombre($nombre) {        
        $this->nombre = $nombre;        
    }

}

// Crear un objeto de la clase Persona
$bruno = new Persona();
$bruno->setNombre("Antonio diaz");
$bruno->imprimir();

$bruno->nombre="Antonio";

$bruno->imprimir();
?>