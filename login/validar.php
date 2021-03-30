 <?php

require('../bd/conectar.php');

	if(isset($_POST['user'])){
	if(isset($_POST['pass'])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$conexion=ConectarBD();
		
		if(!$conexion){
			errorConexion();
		}
		else{
			//$query = 'SELECT 1 AS users FROM login WHERE usuario="'.$user.'" AND pass= "'.password_hash($pass,PASSWORD_BCRYPT).'"';
			$query = 'SELECT pass,tipo FROM login WHERE usuario="'.$user.'" LIMIT 1';
			$res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
			$passwordHASH='';
			
			if ($res->num_rows==1) {
				//Ligamos los datos desde la BD.
				$contra=$res->fetch_assoc();
			if(password_verify($pass,$contra['pass'])){
				session_start();
				$valido=true;
				$_SESSION['usuario']=$user;
				if($contra['tipo']=='admin')
					header('Location: ../admin/index.php');
				
				if($contra['tipo']=='federal')
					header('Location: ../federal/index.php');
				
				if($contra['tipo']=='estatal')
					header('Location: ../estatal/index.php');
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