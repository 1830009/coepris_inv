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
                $query = 'INSERT INTO '.$_POST['tabla'].' (nombre, cantidad, unidad, marca, descripcion) 
                VALUES("'.$_POST['nombre'].'",0,"'.$_POST['unidad'].'","'.$_POST['marca'].'","'.$_POST['descripcion'].'")';
                echo $query;
                $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                
                if($res){
                    avisoGuardadoExito();
                }
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
    <h2>Formulario de Entrada de Productos</h2>
        <form action="Agr_Producto.php" method="POST" accept-charset="utf-8">
        
        <label for="">Departamento:</label>
        <br>
        <select name="tabla">
            <option value="proyecto_federal">Recurso Federal</option>
            <option value="recurso_estado">Recurso Estatal</option>
            <option value="activos">Activos</option>
            <option value="donacion">Donado</option>
            <option value="limpieza">Limpieza</option>
            <option value="papeleria">Papeleria</option>
        </select>
        <br>
        <label for="">Nombre:</label>
        <br>
        <input type="text" name="nombre" placeholder="Ingresa el Nombre del Producto" required>
        <br>
        <label for="">Unidad:</label>
        <br>
        <select name="unidad">
            <option value="Pz.">Piezas</option>
            <option value="kgs.">Kilogramos</option>
            <option value="Mts.">Metros</option>
            <option value="m2.">Metros Cuadrados</option>
            <option value="Lts.">Litros</option>
        </select>
        <br>
        <label for="">Marca:</label>
        <br>
        <input type="text" name="marca" placeholder="Marca del Producto" required >
        <br>
        <label for="">Descripción:</label>
        <br>
        <textarea name="descripcion"  cols="10" rows="20"> Añade una descripción del producto</textarea>
        <br>
        <input type="submit" value="Agregar Producto">
        </form>
    </div>
</body>
</html>
<?php 
}

?>