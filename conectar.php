<?php
	include ("config.php");
			
	$conexion = mysqli_connect($server, $user, $pass);
	
	if (mysqli_connect_errno()) {
		echo "No se puede conectar con el servidor";
		exit();
	}

	mysqli_select_db($conexion, $bd) or die ("No se puede conectar a la BD");

	mysqli_set_charset($conexion, "utf8");
?>