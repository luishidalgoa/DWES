<?php

    use carpeta1\Humano; // si no le creamos alias con AS, daría error ya que no sabría cual usar
    use carpeta2\Humano as Humano2;

 
    require_once("carpeta1/Humano.php");
    require_once("carpeta2/Humano.php");

    echo "index del tutorial coders free<br>";

    // 1 - Sin usar "use"
    $humano1 = new carpeta1\Humano();
    $humano1->saludar();

    //2- Usando use sin alias
    $humano2 = new Humano();
    $humano2->saludar();

    // 3- Usando use con alias
    $humano2 = new Humano2();
    $humano2->saludar();
?>