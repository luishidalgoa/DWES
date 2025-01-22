<?php
require('config.php');
setcookie("usuario", "", time() - 3600, "/");
header("Location: login.php");
?>
