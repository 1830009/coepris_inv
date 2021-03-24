<?php 
	require'login/sesion.php';
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<li><a href="login/./cerrar_sesion.php">Cerrar Sesión</a></li>
    <h1>Bienvenido index 2</h1>
    <?php
     echo password_hash('ejemplo123',PASSWORD_BCRYPT);
     ?>
</body>
</html>