<?php
	session_start(); 
	if (isset($_SESSION["logueado"])) {  
		echo "<p> Usuario: <b>" . $_SESSION["logueado"] . "</b </p>";
		echo "<a href= 'cerrar_sesion.php'> Cerrar Sesion </a>";
	}
	else {
		header("location:index.php");
	}
?>