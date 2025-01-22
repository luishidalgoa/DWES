<?php
// Crear una nueva pila
$stack = new SplStack();

// Añadir elementos a la pila
$stack->push("Primer elemento");
$stack->push("Segundo elemento");
$stack->push("Tercer elemento");

// Desapilar elementos (se eliminarán en orden inverso)
echo $stack->pop(); // Output: Tercer elemento
echo "\n";
echo $stack->pop(); // Output: Segundo elemento
echo "\n";
echo $stack->pop(); // Output: Primer elemento