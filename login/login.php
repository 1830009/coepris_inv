<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="contenedor_login">
        <div class="contenido_login">
            <img src="img/logo-coepris.png" class="logo_login">
            <h1 class="titulo_login">Iniciar sesión</h1>
            <br>
            <form action="validar.php" method="POST" accept-charset="utf-8">
			<label>Usuario:</label>
            <br><br>
            <input type="text" name="usuario" placeholder="Ingrese usuario">
            <br><br>
            <label>Contraseña:</label>
            <br><br>
            <input type="password" name="pass"placeholder="Ingrese contraseña">
            <br>
            <input type="submit" value="Ingresar" class="boton_login">
			</form>
        </div>
        <div class="imagen_login">
            <img src="img/Coepris.PNG" class="img_coepris">
        </div>
    </div>
</body>
</html>