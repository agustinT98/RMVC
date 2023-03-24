<html>

<head>
	<title> Usuario a Borrar </title>
	<link rel="stylesheet" type="text/css" href="miEstilo.css"> 
</head>


<body>

<?php  
 
	
	include("conexion.php");
	
	$nombreUsu = $_POST["nombre"]; 
	$sql = "SELECT * FROM usuario WHERE detalle = '$nombreUsu'; ";
	$resultado = mysqli_query($conexion, $sql); 
	if ($row = mysqli_fetch_row($resultado)) {
		echo "<h1 id='titulo'> Usuario a eliminar </h1>";	
		echo "<br></br>";
		echo "<form method='post' action='eliminarUsu.php'>";
		echo "<input type='hidden' name='clave' value='".$row[0]."' /> ";
		echo "Nombre de usuario &nbsp <input id='usu' type='text' name='usu' value='".$row[1]."' required autofocus disabled=true /> ";
		echo "<br></br>";
		 
		echo "<input class='boton' type='button' value='Cancelar' onClick='location=\"eliminarUsu.html\"'> ";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<input class='boton' type='submit' value='Eliminar'/> ";
		echo "</form>";
	} else {echo "<h3>El usuario $nombreUsu no existe.</h3>";
	        echo "<input class='boton' type='button' value='Volver'  onClick='location=\"eliminarUsu.html\"'> ";
			}
	echo "</body>";
	
	mysqli_close($conexion);
?>  

</body>

</html>