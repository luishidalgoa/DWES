<?php
require('config.php');

if (!isset($_COOKIE['usuario'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

$stmt = $db->prepare("DELETE FROM medicamentos WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();

header("Location: medicamentos.php");
?>
