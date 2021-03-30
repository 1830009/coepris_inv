<?php 
use Dotenv\Dotenv;

require('../vendor/autoload.php');
	$dotenv= Dotenv::createImmutable('../');
	$dotenv->load();

function ConectarBD(){
    $BDserver= $_ENV['BD_SERVER'];
    $BDuser=$_ENV['BD_USUARIO'];
    $BDpass=$_ENV['BD_PASS'];
    $BDnombre=$_ENV['BD_DATABASE'];

return mysqli_connect($BDserver,$BDuser,$BDpass,$BDnombre);
}

function errorConexion(){
    $_SESSION['usuario']='';
     ?>
    <html>
        <script>
        window.alert('Lo sentimos, Ha ocurrido un error al acceder al servidor!');
        window.location.href='login.php';
        </script>
    </html>
    <?php
    }

    function avisoGuardadoExito(){
        $_SESSION['usuario']='';
         ?>
        <html>
            <script>
            window.alert('El producto ha sido\n Con Exito!');
            window.location.href='Agr_producto.php';
            </script>
        </html>
        <?php
        }
    
        function UpdateUsersExito(){
            
             ?>
            <html>
                <script>
                window.alert('El Usuario ha sido actualizado\n Con Exito!');
                window.location.href='Usuarios.php';
                </script>
            </html>
            <?php
            }
?>