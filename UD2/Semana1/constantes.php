<?php
// Definición de constantes de usuario
define("APP_NAME", "MiAplicación");
echo APP_NAME . "\n";
define("APP_VERSION", "1.0.0");
echo APP_VERSION . "\n";
define("MAX_USERS", 100);
echo MAX_USERS . "\n";
define("DEBUG_MODE", true);
echo DEBUG_MODE . "\n";

// Constantes predefinidas por PHP
echo "PHP version: " . PHP_VERSION . "\n";
echo "Sistema operativo: " . PHP_OS . "\n";
echo "Archivo actual: " . __FILE__ . "\n";

// Ejemplo de uso de is_array e is_integer
$usuarios = ["Luis", "María", "Carlos"];
$edad = 25;

if (is_array($usuarios)) {
    echo "La variable \$usuarios es un array.\n";
}

if (is_integer($edad)) {
    echo "La variable \$edad es un entero.\n";
}

?>

