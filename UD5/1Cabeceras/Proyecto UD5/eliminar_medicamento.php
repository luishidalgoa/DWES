<?php
session_start();
require('config.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

$stmt = $db->prepare("DELETE FROM medicamentos WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();

header("Location: medicamentos.php");
?>