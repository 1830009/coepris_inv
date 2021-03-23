 <?php

use Dotenv\Dotenv;

require('../vendor/autoload.php');
	$dotenv= Dotenv::createImmutable('../');
	$dotenv->load();

	if(isset($_POST['usuario'])){
	if(isset($_POST['pass'])){
		$user=$_POST['usuario'];
		$pass=$_POST['pass'];
		
		$BDserver= $_ENV['BD_SERVER'];
		$BDuser=$_ENV['BD_USUARIO'];
		$BDpass=$_ENV['BD_PASS'];
		$BDnombre=$_ENV['BD_DATABASE'];
		echo 'Datos:';
		echo $BDserver.' '.$BDuser.' '.$BDpass.' '.$BDnombre; 
		$conexion=mysqli_connect($BDserver,$BDuser,$BDpass,$BDnombre);
		
		if(!$conexion){
		die('Ocurrio un Error al intentar conectar con la BD');
		}
		else{
			$query = 'SELECT 1 AS users FROM login WHERE usuario="'.$user.'" AND pass= "'.MD5("$pass").'"';
			$res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
	
			if(mysqli_num_rows($res)==0){
				echo 'Cuenta no encontrada';
			}
			else{
			session_start();
			$valido=true;
			$_SESSION['usuario']=$user;
			header('Location: ../index.php');
			}
		}

		
		}
	}

 ?>