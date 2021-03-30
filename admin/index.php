<?php 
	require '../login/sesion.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="icon" type="image/x-icon" href="img/logotam.png">-->
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <title>Document</title>
</head>
<body>
<li><a href="../login/cerrar_sesion.php">Cerrar Sesión</a></li>
    <h1>Bienvenido a la pagina del ADMIN</h1>
    <li><a href="index2.php">pagina2</a></li>
    <br>
    <button><a href="entrada.php">+ Entrada</a></button>
    <br>
    <button><a href="salida.php">- Salida</a></button>
    <button><a href="Agr_Producto.php">Agregar Producto</a></button>
    <button><a href="Usuarios.php">Administrar Usuarios</a></button>
</body>
</html>