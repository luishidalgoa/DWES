<?php
printf("Número decimal: %d\n", 42); 
// Salida: Número decimal: 42
echo "<br>";
printf("Número binario: %b\n", 5); // Salida: Número binario: 101

echo "<br>";
printf("Número octal: %o\n", 8); // Salida: Número octal: 10

echo "<br>";

printf("Número hexadecimal: %x\n", 255); // Salida: Número hexadecimal: ff

echo "<br>";
printf("Número hexadecimal: %X\n", 255); // Salida: Número hexadecimal: FF

echo "<br>";
printf("Número flotante: %f\n", 3.14159); // Salida: Número flotante: 3.141590
echo "<br>";
printf("Número flotante con 2 decimales: %.2f\n", 3.14159); // Salida: Número flotante con 2 decimales: 3.14
echo "<br>";
printf("Notación científica: %e\n", 12345.6789); // Salida: Notación científica: 1.234568e+4
echo "<br>";
printf("Notación científica: %E\n", 12345.6789); // Salida: Notación científica: 1.234568E+4
echo "<br>";
printf("Hola, %s!\n", "Mundo"); // Salida: Hola, Mundo!
echo "<br>";
printf("Cadena limitada: %.5s\n", "Hola, Mundo"); // Salida: Cadena limitada: Hola,
echo "<br>";
printf("Carácter ASCII 65: %c\n", 65); // Salida: Carácter ASCII 65: A
echo "<br>";
printf("Número alineado a la derecha: '%5d'\n", 42); // Salida: Número alineado a la derecha: '   42'
echo "<br>";
printf("Número alineado a la izquierda: '%-5d'\n", 42); // Salida: Número alineado a la izquierda: '42   '
echo "<br>";
printf("Número con ceros a la izquierda: '%05d'\n", 42); // Salida: Número con ceros a la izquierda: '00042'
echo "<br>";
printf("Esto es un porcentaje: 100%%\n"); // Salida: Esto es un porcentaje: 100%
echo "<br>";
$nombre = "Juan";
$edad = 30;
$altura = 1.75;

printf("Nombre: %s, Edad: %d años, Altura: %.2f metros\n", $nombre, $edad, $altura);
// Salida: Nombre: Juan, Edad: 30 años, Altura: 1.75 metros