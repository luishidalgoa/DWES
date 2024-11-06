<?php
require("funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sumando1 = $_POST['sumando1'];
    $sumando2 = $_POST['sumando2'];

    // Convertir los valores a números, en caso de que el usuario ingrese texto
    $sumando1 = is_numeric($sumando1) ? (float)$sumando1 : 0;
    $sumando2 = is_numeric($sumando2) ? (float)$sumando2 : 0;

    $total = 0;

    // Hacemos un random
    $random = rand(0, 1);
    switch ($random) {
        case 0:
            // Si es 0, sumamos el total consigo mismo
            $total = sumar($sumando1, $sumando2);
            break;
        case 1:
            // Si es 1, restamos el total consigo mismo
            $total = restar($sumando1, $sumando2);
            break;
    }

    // Mostrar el resultado, usando un operador ternario para decidir entre "suma" o "resta"
    echo "El total de la " . ($random == 0 ? "suma: " : "resta: ") . $total;
}
?>
