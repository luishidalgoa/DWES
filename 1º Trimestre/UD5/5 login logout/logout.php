<?php
// Recuperamos la información de la sesión
session_start();

// Y la destruimos
session_destroy();

//Redirigimos al login
header("Location: login.php");
?>