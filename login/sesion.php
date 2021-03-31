<?php 
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('location: /icoepris/login/login.php');
		exit;
	}
	else{
		if(($_SESSION['usuario']=='')){
			header('location: /icoepris/login/login.php');
			exit;
		}
		echo '<b>ID:</b> '.$_SESSION['id'];
		echo '<br> <b>Nombre:</b> '.$_SESSION['usuario'];
	}
 ?>