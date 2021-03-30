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
                $query= 'UPDATE `proyecto_federal` SET `cantidad`= (cantidad +'.$_POST['cantidad'].') 
                WHERE id_federal="'.$_POST['nombre'].'"';
                $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                RegresarIndexFederal();
                
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
        <h2>Formulario de Entrada de Recursos Federales</h2>
        <form action="entrada.php" method="POST" accept-charset="utf-8">
        
        <label for="">Nombre del Producto:</label>
        <br>
        <select name="nombre">
            <?php 
                $conexion=ConectarBD();
                if(!$conexion){
                    echo 'error';
                    //errorConexion();
                    }
                    else{
                        $query= 'SELECT id_federal,nombre FROM proyecto_federal';
                        $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');

                        if($res->num_rows>0){
                            while($fila=$res->fetch_assoc()){
                                echo '<option value="'.$fila['id_federal'].'">'.$fila['nombre'].'</option>';
                            }
                        }       
                    }
            ?>
        </select>
        <br>
        <label for="">Cantidad:</label>
        <input type="number" name="cantidad">
        
        <input type="submit" value="Agregar Entrada">
        </form>
    </div>
</body>
</html>
<?php 
}

?>