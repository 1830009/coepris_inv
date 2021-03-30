<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    if(isset($_POST['nombre'])){
        
        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
            }
            else{
                $query= 'INSERT INTO empleado VALUES("","'.$_POST['nombre'].'","'.$_POST['apat'].'","'.$_POST['amat'].'",
                "'.$_POST['rfc'].'","'.$_POST['email'].'","'.$_POST['tel'].'")';
                mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                
                $idEmpleado= $conexion->insert_id;
                $pass= password_hash($_POST['pass'],PASSWORD_BCRYPT);
                $query= 'INSERT INTO login VALUES("","'.$_POST['usuario'].'","'.$pass.'","'.$_POST['tipo'].'",
                "'.$idEmpleado.'")';
                echo $query;
                mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
        }
    }
    else{
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="icon" type="image/x-icon" href="img/logotam.png">-->
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <title>Entrada</title>
</head>
<body>
<li><a href="../login/cerrar_sesion.php">Cerrar Sesión</a></li>
    <div class="form-entrada">
        <h2>Formulario para Agregar Nuevos Usuarios</h2>
        <form action="AgregarUsuario.php" method="POST" accept-charset="utf-8">
        
        <label for="">Nombre:</label>
        <br>
        <input type="text" name="nombre" placeholder="Nombre del Empleado" required>
        <br>
        <label for="">Apellido Paterno</label>
        <br>
        <input type="text" name="apat" placeholder="Apellido Paterno del Empleado" required>
        <br>
        <label for="">Apellido Materno:</label>
        <br>
        <input type="text" name="amat" placeholder="Apellido Materno del Empleado" required>
        </select>
        <br>
        <label for="">RFC:</label>
        <br>
        <input type="text" name="rfc" placeholder="RFC"  required>
        <br>
        <label for="">Correo Electronico:</label>
        <br>
        <input type="text" name="email" placeholder="ejemplo@example.com" required>
        <br>
        <label for="">Telefono:</label>
        <br>
        <input type="number" name="tel" >
        <br>
        <br>
        <h1>Cuenta del Usuario:</h1>
        <label for="">Usuario:</label>
        <br>
        <input type="text" name="usuario" placeholder="Ingresa Un Usuario" required>
        <br>
        <label for="">Contraseña</label>
        <br>
        <input type="password" name="pass" placeholder="" required>
        <br>
        <label for="">Tipo de Usuario:</label>
        <br>
        <select name="tipo">
            <option value="admin">Administrador</option>
            <option value="federal">Recursos Federales</option>
            <option value="federal">Recursos Estatales</option>
            <option value="activos">Activos</option>
            <option value="archivos">Archivos</option>
            <option value="donacion">Donacion</option>
            <option value="limpieza">Limpieza</option>
            <option value="papaleria">Papeleria</option>
        </select>
        <br>
        <input type="submit" value="Agregar Entrada">
        </form>
    </div>
</body>
</html>
<?php 
}

?>