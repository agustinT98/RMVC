<html>

<head>
	<link rel="stylesheet" type="text/css" href="estilo.css"> 
	<title> Logueo de Usuario </title>
</head>

<body>
  <header>
  <H1> RMV&C </H1>
  </header>
  <center>
  <form id="loguin" name="loguin" method="post" action ="index.php">
    <H3 id="subtitulo"> Inicio de Sesion </H3>
  	<b>Usuario</b>&nbsp; <input type="text" maxlength="10" name="usuario" required autofocus />  
    <br><br>
	<b>Clave</b> &nbsp;&nbsp;&nbsp;&nbsp; <input type="password" maxlength="8" name="clave" required /> 
	<br><br>
	<input type="reset" value="Borrar" class="boton" /> 
	&nbsp;&nbsp;&nbsp;&nbsp; 
	<input type="submit" value="Enviar" name="enviar" class="boton" />  
	
	<?php
		if (isset($_POST["enviar"])) {  
			include ("conectar.php");
			$usu = $_POST['usuario'];
			$cla = $_POST['clave'];
			$consulta = "SELECT * FROM `usuario` WHERE detalle = '$usu' AND pass= '$cla'";
			$resultado = mysqli_query($conexion, $consulta);
			$cantFilas = mysqli_num_rows($resultado);
			if ($cantFilas == 1) {
				session_start();   
				$_SESSION["logueado"] = $usu;
				header("location:principal.php");
			} else {
				echo "<H4 id='error'> Usuario y Clave no existen o no coinciden </H4>" ;
			}
			mysqli_close($conexion);
		}
	?>
  </form>
  </center>
</body>
</html>