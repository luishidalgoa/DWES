<head>
<meta charset="utf-8">
<title>Login 1</title>
</head>

<body>
<?php

//PARTE 2
    session_start();  //PARTE2

        //Que hacemos si NO hay nada almacenado... ??
   /* if(!isset($_SESSION["usuario"])){
            header("Location:login.php"); 

    }*/

    print "<h1>Zona Usuarios Registrados </h1><br>";
    print "<br>Información muy importante <br>";


    // AMPLIA este ejercicio mostrando el nombre del usuario registrado

    print "<h2> Hola, muestra aquí el nombre del usuario registrado </h2>";


    print "<br> Info importante de tu sesión ..." ;

 
// Vamos a hacernos un sistema de navegación con tres páginas más, similares a esta (copiamos y pegamos).
  // Cambiamos el HOLA de esta primera página por "Usuario"

?>




</body>
</html>
