<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Comprobar si el archivo ha sido cargado sin errores
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {

        // Información del archivo
        $nombre_archivo = $_FILES['archivo']['name'];
        $tipo_archivo = $_FILES['archivo']['type'];
        $tmp_archivo = $_FILES['archivo']['tmp_name'];
        $tamaño_archivo = $_FILES['archivo']['size'];
        // Definir el directorio de destino
        $directorio_destino = ''; // Asegúrate de crear esta carpeta y darle permisos de escritura

        // Comprobar el tamaño del archivo (por ejemplo, limitar a 2MB)
        if ($tamaño_archivo <= 2 * 1024 * 1024) {
            // Mover el archivo desde el directorio temporal al directorio de destino
            if (move_uploaded_file($tmp_archivo, $directorio_destino . $nombre_archivo)) {
                echo "El archivo '$nombre_archivo' ha sido subido exitosamente.";
            } else {
                echo "Error al mover el archivo al directorio de destino.";
            }
        } else {
            echo "El archivo es demasiado grande. El tamaño máximo permitido es 2MB.";
        }
    } else {
        echo "No se ha subido ningún archivo o ha ocurrido un error en la carga.";
    }
} else {
    echo "Por favor, use el formulario para subir un archivo.";
}
?>