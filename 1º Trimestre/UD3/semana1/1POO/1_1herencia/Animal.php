<?php
class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function hacerSonido() {
        return "El animal hace un sonido<br>";
    }
}

// Clase Perro que hereda de Animal
class Perro extends Animal {
    public function hacerSonido() {
        return "Guau Guau<br>";
    }
}

class Pato extends Animal {
    public function hacerSonido() {
        return "CUA CUA<br>";
    }
}

$perro = new Perro("Max");
echo $perro->hacerSonido(); // Salida: Guau Guau
$pato = new Pato("Pato");
echo $pato->hacerSonido(); // Salida: CUA CUA
?>