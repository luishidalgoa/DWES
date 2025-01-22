<?php
// 1. Configuración de ejecución
ini_set('max_execution_time', '120'); // 2 minutos
ini_set('memory_limit', '512M');      // 512 MB de memoria

// 2. Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', '1');

// 3. Configuración de sesiones
ini_set('session.gc_maxlifetime', '3600'); // 1 hora
session_set_cookie_params(3600);
session_start();

// 4. Prueba de parámetros configurados
echo "Tiempo de ejecución máximo: " . ini_get('max_execution_time') . " segundos<br>";
echo "Límite de memoria: " . ini_get('memory_limit') . "<br>";
echo "Duración de la sesión: " . ini_get('session.gc_maxlifetime') . " segundos<br>";
?>