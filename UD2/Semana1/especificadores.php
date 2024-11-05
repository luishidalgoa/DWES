<?php
/**
 * Crea un script PHP con diferentes variables numéricas y de cadena 
 * relacionadas con productos de alguna empresa y muéstralas por pantalla, 
 * dos de ellas con 2 decimales, otras dos con 4 decimales, 
 * un entero (sin decimales), una tipo cadena, una de ellas en binario,
 * en notación científica, almacena una variable real, con 3 decimales.. 
 * todo lo que quieras usar basándote en los ejemplos anteriores
 */


// Variables de productos
$nombreProducto = "Cámara DSLR";      // Cadena
$precio = 999.99;                     // Real con dos decimales
$descuento = 0.1500;                  // Real con cuatro decimales (porcentaje de descuento)
$inventario = 100;                    // Entero
$peso = 1.255;                        // Real con tres decimales (en kg)
$costoProduccion = 1200.75e3;         // Notación científica (representa $1,200.75 * 10^3)
$cantidadBinaria = 100;         // Binario (equivale a 100 en decimal)
$calificacionPromedio = 4.7567;       // Real con cuatro decimales

// Mostrar variables formateadas
echo "Nombre del Producto: $nombreProducto<br>";
printf("Precio: $ %.2f <br>", $precio);
printf("Inventario Disponible: $inventario unidades<br>");
printf("Peso: %.3f kg<br>", $peso);
printf("Costo de Producción: $%E\n (notación científica)<br>", $costoProduccion);
printf("Cantidad en Binario: %b\n (equivalente a 100 en decimal)<br>", $cantidadBinaria);
printf("Calificación Promedio: %.4f <br>", $calificacionPromedio);

// SPRINTF
echo "<br>";
$calificacionPromedio = sprintf("%.4f", $calificacionPromedio);
echo $calificacionPromedio;


?>
 