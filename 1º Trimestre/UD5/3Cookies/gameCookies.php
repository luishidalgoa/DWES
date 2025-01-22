<?php
// Guardar el puntaje del jugador en una cookie válida por 1 día
setcookie("puntaje_jugador", "1500", time() + 86400, "/");

// Acceder al puntaje
if (isset($_COOKIE['puntaje_jugador'])) {
    echo "Tu puntaje actual es: " . $_COOKIE['puntaje_jugador'];
}



// Modificar el nivel alcanzado por el jugador
setcookie("nivel_jugador", "2", time() + 86400, "/");

// Cambiar el nivel a 3
setcookie("nivel_jugador", "3", time() + 86400, "/");

echo "<br> Has avanzado al nivel: " . $_COOKIE['nivel_jugador'];




// Eliminar la cookie
// Para eliminar la cookie, se establece una fecha de expiración en el pasado
setcookie("puntaje_jugador", "", time() - 3600, "/");

echo "Puntaje reiniciado.";




// Guardar configuración de volumen del juego (solo válida durante la sesión)
setcookie("volumen_audio", "80", 0, "/");

if (isset($_COOKIE['volumen_audio'])) {
    echo "Volumen actual: " . $_COOKIE['volumen_audio'] . "%";
}


// Guardar preferencia de idioma en una cookie válida por 30 días
setcookie("idioma", "es", time() + (30 * 24 * 60 * 60), "/");

echo "El idioma seleccionado es: " . $_COOKIE['idioma'];



foreach ($_COOKIE as $nombre => $valor) {
    setcookie($nombre, "", time() - 3600, "/");
}
echo "Todas las cookies han sido eliminadas. ¡Juego reiniciado!";
?>
