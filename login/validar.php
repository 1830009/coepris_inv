 <?php

use Dotenv\Dotenv;

require('../vendor/autoload.php');
	$dotenv= Dotenv::createImmutable('../');
	$dotenv->load();

	if(isset($_POST['user'])){
	if(isset($_POST['pass'])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$BDserver= $_ENV['BD_SERVER'];
		$BDuser=$_ENV['BD_USUARIO'];
		$BDpass=$_ENV['BD_PASS'];
		$BDnombre=$_ENV['BD_DATABASE'];
	
		$conexion=mysqli_connect($BDserver,$BDuser,$BDpass,$BDnombre);
		
		if(!$conexion){
		?>
		<html>
			<script>
			window.alert('Lo sentimos, Ha ocurrido un error al acceder al servidor!');
			window.location.href='login.php';
			</script>
		</html>
		<?php
		$_SESSION['usuario']='';
		exit;
		}
		else{
			//$query = 'SELECT 1 AS users FROM login WHERE usuario="'.$user.'" AND pass= "'.password_hash($pass,PASSWORD_BCRYPT).'"';
			$query = 'SELECT pass FROM login WHERE usuario="'.$user.'" LIMIT 1';
			$res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
			$passwordHASH='';
			
			if ($res->num_rows==1) {
				//Ligamos los datos desde la BD.
				$contra=$res->fetch_assoc();
			if(password_verify($pass,$contra['pass'])){
				session_start();
				$valido=true;
				$_SESSION['usuario']=$user;
				header('Location: ../index.php');
			}
		
			}
			else{
				?>
		<html>
			<script>
			window.alert('Lo sentimos, El usuario y Contraseña\n No son los correctos!');
			window.location.href='login.php';
			</script>
		</html>
		<?php
			}
		}
	}
}

 ?>