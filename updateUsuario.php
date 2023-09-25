
<?php  
 
	include("conexion.php");
	$clave = $_POST["clave"];  
	$nombreUsu = $_POST["nombre"];  
	$pass = $_POST["pass"];
	if (mysqli_query($conexion, "UPDATE usuario set detalle='$nombreUsu', pass='$pass' WHERE ID=$clave")){
		if (mysqli_affected_rows($conexion) > 0) {
			 echo " <br></br><br></br><h3>Actualizacion existosa ...</h3> ";
		} else { echo " <br></br><br></br><h3>No se actualizaron registros ...</h3> "; }
	} else { echo " <br></br><br></br><h3>Error en la actualización ...</h3> "; }
	
	echo "<input class='boton' type='button' value='Volver' onClick='location=\"Modificausu.html\"'> ";
	
	mysqli_close($conexion);
	   
?>  