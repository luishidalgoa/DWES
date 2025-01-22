<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coches</title>
</head>

<body>
<?php
    

     //Importacion de las clases que se encuentran en un archivo externo.
     include 'Vehiculos.php';


    //Creacion de un coche y un camion dos clases diferentes.
    $mazda=new Coche();
    $volvo=new Camion();

    //Se imprime por pantalla la cantidad de ruedas de cada objeto. Creados ambos por defecto.
    echo "El mazda tiene " . $mazda->get_ruedas() . " ruedas <br>";
    echo "El volvo tiene " . $volvo->get_ruedas() . " ruedas <br>";

    echo "El mazda tiene " . $mazda->get_motor() . " de motor <br>";
    echo "El volvo tiene " . $volvo->get_motor() . " de motor <br>";

?>
</body>

</html>