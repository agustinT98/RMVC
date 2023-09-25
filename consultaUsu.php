<html>

<head>
	<title> Listado de Alumnos </title>
	<link rel="stylesheet" type="text/css" href="consulta.css"> 
	<style>
		h1 {
			margin: auto;
			color: #F00;
		}
		
		table{
			witdh: 50%;
			border: 1px dotted #F00;
			margin: left;
		}
	</style>
</head>


<body>

<?php  
 
	include("conexion.php");
	
	echo "<body>";
	echo "<h1 id='titulo'> Lista de Usuarios </h1>";	
	echo "<br></br>";
	$sql = "SELECT * FROM usuario ORDER BY 3 ASC";
	$resultado = mysqli_query($conexion, $sql); 
	if ( !($fila=mysqli_fetch_row($resultado)) ) echo "<h3>No hay usuarios registrados</h3>";
	else {	echo "<table>";  
			echo "<tr>";  
			echo "<th>NOMBRE</th>";  
			echo "</tr>";
			echo "<tr>";  
			echo "<td>$fila[1]</td>";  
			 
			echo "</tr>";  
			while ( $fila = mysqli_fetch_row($resultado) ) {    
				echo "<tr>";  
				echo "<td>$fila[1]</td>";  
				  
				 
			 
				echo "</tr>";  
			}  
			echo "</table>";  
	} 
	echo "<br></br>";
	
	echo "<input type='button' id='boton' value='Volver' class='boton' onClick='location=\"usuario.html\"'> ";
	
	echo "</body>";
	
	mysqli_close($conexion);
?>  

</body>

</html>