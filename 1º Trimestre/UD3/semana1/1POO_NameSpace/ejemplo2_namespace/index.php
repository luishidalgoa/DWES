<?php
require_once 'Users/Admin.php';
require_once 'Users/Guest.php';

use Users\Admin;
use Users\Guest;

    $admin = new Admin();
    echo "Rol del usuario: " . $admin->getRole(); // Output: Rol del usuario: Administrador

    $guest = new Guest();
    echo "\nRol del usuario: " . $guest->getRole(); // Output: Rol del usuario: Invitado

?>

<?php 
//Alternativa sin utilizar USE
/*

require_once 'Users/Admin.php';
require_once 'Users/Guest.php';

//Vemos cómo aquí hay que anteponer el ESPACIO DE NOMBRES
$admin = new \Users\Admin();
echo "Rol del usuario: " . $admin->getRole();

$guest = new \Users\Guest();
echo "\nRol del usuario: " . $guest->getRole();
*/
?>