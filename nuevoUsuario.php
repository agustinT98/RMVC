<?php  
	
	include("conexion.php");
	$nombre = $_POST["nombre"]; 
	$contrasenia = $_POST["pass"]; 
	$consulta = "SELECT count(*) FROM usuario WHERE detalle='$nombre'" ;
	$resultado= mysqli_query($conexion, $consulta);
	$fila = mysqli_fetch_row($resultado);  
	if ($fila[0] == 1) {  
		echo "<H3> El usuario " . $nombre . " ya existe </H3>" ;
	} else {
		$sql="INSERT INTO usuario (detalle, pass) VALUES ('$nombre', '$contrasenia')";
		mysqli_query($conexion, $sql);
		mysqli_close($conexion);
		echo 'El usuario: <b> ' .$nombre. '</b> fue registrado con exito';
		echo "<br></br>";
	}
	
	echo "<input type='button' id='boton' value='Volver' onClick='location=\"nuevousu.html\"'> ";
?> 
