<!DOCTYPE html>
<html>
<head>
	<title>Conexion a la BD</title>
</head>
<body>
	
	<?php
	
	$db_host = "localhost";  
	$db_usuario = "root";
	$db_pass = "";
	$db_nombre = "proyecto_practica";
	
	$conexion = mysqli_connect($db_host, $db_usuario, $db_pass);
	
	if ( mysqli_connect_errno() ) {
		echo "No se puede conectar con el servidor";
		exit();
	}
	
	echo "Nos conectamos al servidor";
	
	mysqli_select_db($conexion, $db_nombre ) or die ("No se puede conectar a la BBDD");
	
	mysqli_set_charset($conexion, "utf8");

	$usu = $_POST ['nombre'];
	$cla = $_POST ['contraseña'];

	$consulta = "SELECT count(*) AS cantidad FROM usuario WHERE detalle='$usu' AND pass='$cla'" ;
	
	$resultado= mysqli_query($conexion, $consulta);
	$fila= mysqli_fetch_assoc($resultado);
	if ($fila ['cantidad'] == 1) {
		echo "<h3>Error, el usuario ya se encuentra registrado en nuestra base de datos. </h3>";		 
	}
	else echo "<h3> Usuario y clave no existen o no coinciden con la base de datos </h3>" ;
	?>
	 
</body>
</html>