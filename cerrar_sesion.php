<?php 
	session_start();  
	session_destroy(); 
	$conexion=null;
	header("location:index.php");		
?>