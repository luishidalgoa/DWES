<?php
session_start();
session_destroy();
setcookie('usuario', '', time() - 3600);
header('Location: index.php');
?>