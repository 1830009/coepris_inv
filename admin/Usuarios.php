<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    
    if(isset($_GET['x'])){
        
        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
            }
            else{
                
                $id_log=$_GET['x'];
                $query= 'DELETE FROM login WHERE id_empleado='.$id_log;
                mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
        }
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminUsuarios</title>
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <script src="confirmar.js" language="javascript" type="text/javascript"></script>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <br><br>
    <table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Ap. Paterno</th>
        <th>Ap. Materno</th>
        <th>RFC</th>
        <th>E-mail</th>
        <th>Telefono</th>
        <th>Usuario</th>
        <th>Tipo</th>
    </tr>
    <?php 

        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
            }
            else{
                $query= 'SELECT e.id_empleado id,e.nombre nombre,e.apellido_pat apat,e.apelldio_mat amat,
                        e.rfc rfc,e.email email,e.telefono tel,l.usuario usuario,l.tipo tipo 
                        FROM empleado e JOIN login l ON e.id_empleado = l.id_empleado
                        ORDER BY e.id_empleado';
                $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');

                if($res->num_rows>0){
                    while($fila=$res->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>'.$fila['id'].' </td>';
                        echo '<td>'.$fila['nombre'].' </td>';
                        echo '<td>'.$fila['apat'].' </td>';
                        echo '<td>'.$fila['amat'].' </td>';
                        echo '<td>'.$fila['rfc'].' </td>';
                        echo '<td>'.$fila['email'].' </td>';
                        echo '<td>'.$fila['tel'].' </td>';
                        echo '<td>'.$fila['usuario'].' </td>';
                        echo '<td>'.$fila['tipo'].' </td>';
                        echo '<td><button><a href="EditarUsuario.php?x='.$fila['id'].'">Editar</a></button></td>';
                        echo '<td><button onclick="eliminar('.$fila['id'].',\''.$fila['nombre'].'\')">Eliminar</button></td>';
                        echo '</tr>';
                        
                    }
                }
        }
    ?>
    </table>

<button><a href="AgregarUsuario.php">Agregar Nuevo Usuario</a></button>
</body>

</html>
