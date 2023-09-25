<!DOCTYPE html>
<html>
<head>
	<title>Conexion a la BD Alumnos</title>
</head>
<body>
	
	<?php
	
	include ("conexion.php");
	
	 
	
	$usu = $_POST['nombre'];
	$cla = $_POST['pass'];

	$consulta = "SELECT count(*) as cantidad FROM usuario WHERE detalle='$usu' AND pass='$cla'" ;
	
	$resultado= mysqli_query($conexion, $consulta);
	$fila = mysqli_fetch_row($resultado);  //mysqli_fetch_assoc($resultado);
	
	if ($fila[0] == 1) {  //$fila['cantidad'] == 1
		header("location:Pantallaprincipal.html");
	} else {
		echo "<H3> Usuario y Clave no existen o no coinciden </H3>" ;
		echo "<input type='button' value='Volver' onClick='location=\"Index.html\"'> ";
	}

	mysqli_close($conexion);
	?>
	
</body>
</html>