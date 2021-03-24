<?php 
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('location: login/login.php');
		exit;
	}
	else{
		echo $_SESSION['usuario'];
		if(($_SESSION['usuario']=='')){
			header('location: login/login.php');
			exit;
		}
	}
 ?>