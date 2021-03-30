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
                $query= 'UPDATE `empleado` SET `nombre`="'.$_POST['nombre'].'",`apellido_pat`="'.$_POST['apat'].'",
                    `apelldio_mat`="'.$_POST['amat'].'",`rfc`="'.$_POST['rfc'].'",`email`="'.$_POST['email'].'",
                    `telefono`="'.$_POST['tel'].'" WHERE id_empleado='.$_POST['id'];
                    
                mysqli_query($conexion,$query) or die('Error empleado');
                $pass= password_hash($_POST['pass'],PASSWORD_BCRYPT);
                if($_POST['pass']!=''){
                    $pass= password_hash($_POST['pass'],PASSWORD_BCRYPT);
                    $query='UPDATE `login` SET `usuario`="'.$_POST['usuario'].'",`pass`="'.$pass.'",
                        `tipo`="'.$_POST['tipo'].'" WHERE id_empleado='.$_POST['id'];
                }else{
                    $query='UPDATE `login` SET `usuario`="'.$_POST['usuario'].'",
                        `tipo`="'.$_POST['tipo'].'" WHERE id_empleado='.$_POST['id'];
                }
                mysqli_query($conexion,$query) or die('Error LOGIN');
                UpdateUsersExito();
        }
    }else{

        
        $conexion=ConectarBD();
        $query= 'SELECT e.id_empleado id,e.nombre nombre,e.apellido_pat apat,e.apelldio_mat amat,
                        e.rfc rfc,e.email email,e.telefono tel,l.usuario usuario,l.tipo tipo 
                        FROM empleado e JOIN login l ON e.id_empleado = l.id_empleado
                        WHERE e.id_empleado='.$_GET['x'];
        
        $res=mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
        if($res->num_rows>0){
            $fila=$res->fetch_assoc();
    
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
        <h2>Formulario para Editar Usuario</h2>

        <form action="EditarUsuario.php" method="POST" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?php echo $fila['id']?>">
        <label for="">Nombre:</label>
        <br>
        <input type="text" name="nombre" value="<?php echo $fila['nombre']?>" placeholder="Nombre del Empleado" required>
        <br>
        <label for="">Apellido Paterno</label>
        <br>
        <input type="text" name="apat" value="<?php echo $fila['apat']?>" placeholder="Apellido Paterno del Empleado" required>
        <br>
        <label for="">Apellido Materno:</label>
        <br>
        <input type="text" name="amat" value="<?php echo $fila['amat']?>" placeholder="Apellido Materno del Empleado" required>
        </select>
        <br>
        <label for="">RFC:</label>
        <br>
        <input type="text" name="rfc" value="<?php echo $fila['rfc']?>" placeholder="RFC"  required>
        <br>
        <label for="">Correo Electronico:</label>
        <br>
        <input type="text" name="email" value="<?php echo $fila['email']?>" placeholder="ejemplo@example.com" required>
        <br>
        <label for="">Telefono:</label>
        <br>
        <input type="number" value="<?php echo $fila['tel']?>" name="tel" >
        <br>
        <br>
        <h1>Cuenta del Usuario:</h1>
        <label for="">Usuario:</label>
        <br>
        <input type="text" name="usuario" value="<?php echo $fila['usuario']?>" placeholder="Ingresa Un Usuario" required>
        <br>
        <label for="">Contraseña</label>
        <p>Deje el Espacio en blanco si no desea cambiar la contraseña</p>
        <input type="password" name="pass" placeholder="">
        <br>
        <label for="">Tipo de Usuario:</label>
        <br>
        <select name="tipo">
            <option value="<?php echo $fila['tipo']?>"><?php echo $fila['tipo']?> </option>
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
    }

?>