<?php
abstract class Transporte {
    protected $velocidad;

    public function __construct($velocidad) {
        $this->velocidad = $velocidad;
    }

    // Método abstracto
    abstract public function mover();
}

class Coche extends Transporte {
    public function mover() {
        return "El coche se mueve a $this->velocidad km/h";
    }
}

class Bicicleta extends Transporte {
    public function mover() {
        return "La bicicleta se mueve a $this->velocidad km/h";
    }
}

$coche = new Coche(120);
echo $coche->mover(); // Salida: El coche se mueve a 120 km/h

$bicicleta = new Bicicleta(20);
echo $bicicleta->mover(); // Salida: La bicicleta se mueve a 20 km/h
?>