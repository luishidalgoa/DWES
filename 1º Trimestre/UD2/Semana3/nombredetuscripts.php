<?php
function imprimir_arreglo($arreglo){
    print_r($arreglo);
}

$mi_arreglo = ["a", "b", "c"];
//con array()
$mi_arreglo2 = array("a", "b", "c");
//con =>
$mi_arreglo3 = array("a"=>"1", "b"=>"2", "c"=>"3");
//arrays multidimensionales  o arreglos anidados
$mi_arreglo4 = array(
    array("a", "b", "c"), 
    array("d", "e", "f")
);

imprimir_arreglo($mi_arreglo);
imprimir_arreglo($mi_arreglo2);
imprimir_arreglo($mi_arreglo3);
imprimir_arreglo($mi_arreglo4);
print "FOR->EACH \n";
foreach ($mi_arreglo3 as $key) {
    print $key;
    print "\n";
}
//---------------
print "WHILE->NEXT \n";
while($valor = current($mi_arreglo3)){
    print $valor."\n";
    next($mi_arreglo3);
}