<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso_Pildoras</title>
</head>

<body>
<?php


    //Importacion de las clases que se encuentran en un archivo externo.
    include 'Concesionario.php';

    //Modificacion de la variable estatica $ayuda.


    Compra_vehiculo::descuento_gobierno();
    //echo "<br/><br/> La ayuda es " . Compra_vehiculo::$ayuda;

    //Se crea el coche de antonio con sus extras y modelo expecifico. Finaliza imprimiendo el precio final.
    $compra_Antonio = new Compra_vehiculo("compacto");
    $compra_Antonio->climatizador();
    $compra_Antonio->tapiceria_cuero("blanco");
    echo $compra_Antonio->precio_final() . "<br>";

    //Se crea el coche de Ana con sus extras y modelo expecifico. Finaliza imprimiendo el precio final.
    $compra_Ana = new Compra_vehiculo("compacto");
    $compra_Ana->climatizador();
    $compra_Ana->tapiceria_cuero("rojo");
    echo $compra_Ana->precio_final() . "<br>";


    ?>
</body>

</html>