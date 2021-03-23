<?php 
	
	require 'sesion.php';
	$_SESSION = array();
	session_destroy();
 ?>

 <!DOCTYPE html>
 <html>

 	<p>
 		<H1>Sesión Cerrada... <br>Vuelva Pronto</H1>
 		<button id="b_login" name="b_login"><a href="login.php" >LogIn de Nuevo</a></button>
 	</p>
 </body>
 </html>