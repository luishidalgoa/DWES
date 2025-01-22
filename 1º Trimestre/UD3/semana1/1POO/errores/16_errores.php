<?php

/*
PHP clasifica los errores que ocurren en diferentes niveles. Cada nivel se identifica con una constante. Por ejemplo:

E_ERROR: errores fatales, no recuperables. Se interrumpe el script.
E_WARNING: advertencias en tiempo de ejecuci贸n. El script no se interrumpe.
E_NOTICE: avisos en tiempo de ejecuci贸n.
*/
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
//$resultado = $dividendo / $divisor;

error_reporting(E_ALL & ~E_NOTICE);
set_error_handler("miManejadorErrores");
//$resultado = $dividendo / $divisor;
//restore_error_handler(); // vuelve al anterior

echo $variable; //Advierte de que la variable no existe


function miManejadorErrores($nivel, $mensaje) {
    switch($nivel) {
        case E_ERROR:
            echo "<strong>Esto es un ERROR!=</strong>: $mensaje.<br/>";
            break;
        case E_WARNING:
            echo "<strong>Advertencia!</strong>: $mensaje.<br/>";
            break;
        default:
            echo "Error de tipo no especificado: $mensaje.<br/>";
    }
}


$dividendo=2;
$divisor=0;



try {
    if ($divisor == 0) {
        throw new Exception("Divisi贸n por cero.");
    }
    $resultado = $dividendo / $divisor;
    echo "La divisi贸n es: " . $resultado;

} catch (Exception $e) {
    echo "Se ha producido el siguiente error: ".$e->getMessage();
}

?>
