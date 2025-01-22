<?php

//Ahora creamos la clase con visibilidad protegida y establecemos getters y setters
class Punto {
    public function __construct(
        protected float $x = 0.0,
        protected float $y = 0.0,
        protected float $z = 0.0,
    ) {}

    public function getX(): float {
        return $this->x;
    }

    public function getY(): float {
        return $this->y;
    }

    public function getZ(): float {
        return $this->z;
    }
}

    $puntazo = new Punto(1,2,3 );
    echo "Las coordenadas son: ";
    echo $puntazo->getX() . ", ";
    echo $puntazo->getY() . ", ";
    echo $puntazo->getZ();
?>
