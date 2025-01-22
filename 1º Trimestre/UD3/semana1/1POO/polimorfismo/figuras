<?php
class Figura {
    public function calcularArea() {
        return 0;
    }
}

class Cuadrado extends Figura {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Circulo extends Figura {
    private $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return pi() * ($this->radio ** 2);
    }
}

// Polimorfismo en acción
$figuras = [new Cuadrado(4), new Circulo(3)];

foreach ($figuras as $figura) {
    echo "Área: " . $figura->calcularArea() . "\n";
}
?>