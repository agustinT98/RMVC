<?php  

//Se invoca desde mostrarUsuarioaBorrar.php //
	include("conexion.php");
	$clave = $_POST["clave"];
	$nombreUsu = $_POST["usu"];
			
	if (mysqli_query($conexion, "DELETE FROM usuario WHERE ID=$clave")){
		if (mysqli_affected_rows($conexion) > 0) {
			 echo " <br></br><br></br><h3>Se elimino el usuario ...</h3> ";
		} else { echo " <br></br><br></br><h3>No se borraron registros ...</h3> "; }
	} else { echo " <br></br><br></br><h3>Error en la eliminación ...</h3> "; }
	
	echo "<input class='boton' type='button' value='Volver' onClick='location=\"usuario.html\"'> ";
	
	mysqli_close($conexion);
	   
?>  
