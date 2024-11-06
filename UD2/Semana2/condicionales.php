<?php
 $comida = 'pastel';

 $valor_devuelto = match ($comida) {
     'manzana' => 'Esta comida es una manzana',
     'barra' => 'Esta comida es una barra',
     'pastel' => 'Esta comida es un pastel',
 };

print $valor_devuelto;
echo "\n";
//ejemplo 2
 $age = 18;

 $output = match (true) {
     $age < 2 => 'Eres un bebé',
     $age < 10 => 'Eres un niño',
     $age < 18 => 'Eres un adolescente',
     $age >= 18 => 'Eres mayor de edad',
     $age < 40 => 'Eres un adulto joven',
     $age >= 40 => 'Eres un adulto viejo'
 };

 var_dump($output);
 ?>