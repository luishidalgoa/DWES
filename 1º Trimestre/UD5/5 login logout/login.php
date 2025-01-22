<head>
<meta charset="utf-8">
<title>LOGIN</title>
<link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<h2>Log in</h2>
<p>Esta prática es un sistema de login que utiliza sesiones y logout</p>  

  

<form action="comprueba_login.php" method="post">


<table>
    <tr>
        <td class="izq">  Login </td>
        <td class="der"><input type="text" name="login"> </td>
     </tr>
    <tr>
        <td class="izq">  Contraseña </td>
        <td class="der"><input type="password" name="password"> </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="enviar" value="Login"> </td>

    </tr>
</table>
 

</body>
</html>