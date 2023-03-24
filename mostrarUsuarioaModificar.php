<html>

<head>
	<title> Usuario a Modificar </title>
	<link rel="stylesheet" type="text/css" href="modifica.css"> 
</head>


<body>


<?php  
 
	
	include("conexion.php");
	
	$nombreU = $_POST["nombre"]; 
	$sql = "SELECT * FROM usuario WHERE detalle='$nombreU'";
	$resultado = mysqli_query($conexion, $sql); 
	if ($row=mysqli_fetch_row($resultado)) {
		echo "<h1 id='titulo'> Usuario a Modificar </h1>";	
		echo "<br></br>";
		echo "<form method='post' action='updateUsuario.php'>";
		echo "<input type='hidden' name='clave' value='".$row[0]."' /> ";
		echo "Nombre &nbsp <input id='nombre' type='text' name='nombre' value='".$row[1]."'  required autofocus /> ";
		echo "<br></br>";
		echo "contraseña &nbsp <input id='contraseña' type='password' name='pass' value='".$row[2]."'   /> ";
		echo "<br></br>";	
		echo "<input class='boton' type='button' value='Volver' onClick='location=\"Modificausu.html\"'> ";
		echo "<input class='boton' type='reset' value='Limpiar'/> ";
		echo "<input class='boton' type='submit' value='Enviar'/> ";
		echo "</form>";
	} else {echo "<h3>El usuario $nombreU no existe.</h3>";
	        echo "<input class='boton' type='button' value='Volver' onClick='location=\"Modificausu.html\"'> ";
			}
	echo "</body>";
	
	mysqli_close($conexion);
?>  

</body>

</html>