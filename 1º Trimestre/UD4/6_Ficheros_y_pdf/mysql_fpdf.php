<?php
// Importar la biblioteca FPDF
require('fpdf186/fpdf.php');

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "1234", "DWES");

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}

// Consultar los datos de la tabla 'coches'
$query = "SELECT id, marca, modelo, anio FROM coches";
$resultado = $mysqli->query($query);

// Crear un nuevo PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título del documento
$pdf->Cell(0, 10, 'Lista de Coches', 0, 1, 'C');
$pdf->Ln(10); // Salto de línea

// Encabezados de la tabla
$pdf->Cell(20, 10, 'ID', 1, 0, 'C');
$pdf->Cell(50, 10, 'Marca', 1, 0, 'C');
$pdf->Cell(50, 10, 'Modelo', 1, 0, 'C');
$pdf->Cell(30, 10, 'Anio', 1, 1, 'C');

// Agregar los datos a la tabla
while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(20, 10, $fila['id'], 1, 0, 'C');
    $pdf->Cell(50, 10, $fila['marca'], 1, 0, 'C');
    $pdf->Cell(50, 10, $fila['modelo'], 1, 0, 'C');
    $pdf->Cell(30, 10, $fila['anio'], 1, 1, 'C');
}

// Cerrar la conexión
$mysqli->close();

// Salida del PDF
$pdf->Output('D', 'coches.pdf');
?>