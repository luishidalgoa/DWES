<?php
// Obtener la fecha y hora actual
$fechaActual = date("Y-m-d H:i:s");

echo "Fecha y hora actual (Y-m-d H:i:s): " . $fechaActual . "\n";

// 1. Día completo (Lunes, Martes, etc.) y fecha en formato "d/m/Y"
echo "Día y fecha (l, d/m/Y): " . date("l, d/m/Y") . "\n";

// 2. Fecha en formato día/mes/año en dos dígitos
echo "Fecha en formato corto (d/m/y): " . date("d/m/y") . "\n";

// 3. Fecha en formato mes completo, día, año
echo "Fecha completa (F d, Y): " . date("F d, Y") . "\n";

// 4. Fecha con nombre de día corto y nombre de mes corto
echo "Fecha con nombre de día y mes corto (D, M d, Y): " . date("D, M d, Y") . "\n";

// 5. Fecha y hora en formato 12 horas con AM/PM
echo "Fecha y hora con AM/PM (m/d/Y h:i A): " . date("m/d/Y h:i A") . "\n";

// 6. Año en formato de 4 dígitos y semana del año
echo "Año y semana del año (Y, W): " . date("Y, W") . "\n";

// 7. Hora en formato de 24 horas con minutos y segundos
echo "Hora en formato 24 horas (H:i:s): " . date("H:i:s") . "\n";

// 8. Fecha y hora en el formato ISO 8601
echo "Fecha y hora en ISO 8601 (c): " . date("c") . "\n";

// 9. Zona horaria y hora en formato de 12 horas con AM/PM
echo "Hora y zona horaria (h:i A T): " . date("h:i A T") . "\n";
?>
