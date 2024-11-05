<?php
$alumno = "Manuel Pérez";
$edad = 19;
$esVerdad = true;
$colores = array("rojo", "verde", "azul");

class Coche {
    public $marca;
    public function __construct($marca){
        $this->marca = $marca;
    }
}

$miCoche = new Coche("Ford");

$vacio = null;

//----------------------------------------------------
$x = 11;
function miFuncion(){
    global $x; // Permite acceder a la variable global $x
    printf("$x\n");
}

miFuncion();

function otraFuncion(){
    $y = 5;
    print("$y\n");
}

otraFuncion();

function contador(){
    static $contador = 0; // Permite acceder a la variable global $contador
    $contador++;
    printf("$contador\n");
}

contador();
contador();
contador();