<?php
/*
La gestión de excepciones forma parte desde PHP 5. Su funcionamiento es similar a Java, 
haciendo uso de un bloque try / catch / finally. 
Si detectamos una situación anómala y queremos lanzar una excepción, 
deberemos realizar throw new Exception (adjuntando el mensaje que lo ha provocado).
*/
//$dividendo=10;
$divisor=2;
//$divisor=0;



try {
    if ($divisor == 0) {
        throw new Exception("División por cero.");
    }
    $resultado = $dividendo / $divisor;
    echo "La división es: " . $resultado;

} catch (Exception $e) {
    echo "Se ha producido el siguiente error: ".$e->getMessage();
}
