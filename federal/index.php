<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="icon" type="image/x-icon" href="img/logotam.png">-->
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <title>Inv. Federal</title>
</head>
<body>
<li><a href="../login/cerrar_sesion.php">Cerrar Sesión</a></li>
    <h1>Bienvenido A LA PAGINA DEL FEDERAL</h1>
    <li><a href="index2.php">pagina2</a></li>
    <h1>________________</h1>

<div class="tabla-fed">
<table>
<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Unidad</th>
        <th>Marca</th>
        <th>Descripción</th>
    </tr>
    <?php 
        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
            }
            else{
                $query= 'SELECT * FROM proyecto_federal';
                $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');

                if($res->num_rows>0){
                    while($fila=$res->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>'.$fila['id_federal'].' </td>';
                        echo '<td>'.$fila['nombre'].' </td>';
                        echo '<td>'.$fila['cantidad'].' </td>';
                        echo '<td>'.$fila['unidad'].' </td>';
                        echo '<td>'.$fila['marca'].' </td>';
                        echo '<td>'.$fila['descripcion'].' </td>';
                        echo '</tr>';
                    }
                }       
            }
    ?>
</table>    
</div>
<br>
<button><a href="entrada.php">+ Entrada</a></button>
    <br>
<button><a href="salida.php">- Salida</a></button>
<div class="reporte-btn">
    <h2>Generar Reporte:</h2>
    <button><a href="/icoepris/reporte/total-inv.php">Existencia en el Inventario</a></button>
    <button><a href="/icoepris/reporte/pieza-inv.php">Pieza individual en el Inventario</a></button>
    
</div>
</body>
</html>