<?php
$contadorWhile = 0;
while($contadorWhile < 3) {
    $contadorWhile++;
    print $contadorWhile;
    echo "\n";
}

$contadorFor = 0;
for($contadorFor = 0; $contadorFor < 3; $contadorFor++) {
    print $contadorFor;
    echo "\n";
}

$contadorDoWhile = 0;
do {
    $contadorDoWhile++;
    print $contadorDoWhile;
    echo "\n";
} while($contadorDoWhile < 3);
?>