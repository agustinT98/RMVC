<?php
	include ("verifica_sesion.php");

	include ("conectar.php");

	$error=0;

	if (isset($_POST['insertar'])) {
		$u = $_POST['detalle'];
		$p = $_POST['pass'];
		$e = $_POST['email'];		
		$sql = "insert into usuario (detalle, pass, email) values ('$u','$p', '$e')";
		if (!mysqli_query($conexion, $sql)) $error=1;
	}
	if (isset($_POST['actualizar'])) {
		$id = $_POST['ID'];
		$n = $_POST['detalle'];
		$p = $_POST['pass'];
		$e = $_POST['email'];
		$sql = "update usuario set detalle='$n', pass='$p', email='$e' where ID=$id";
		mysqli_query($conexion, $sql);
	}
	
	if (isset($_GET['eliminar'])) {
		$id = $_GET['eliminar'];
		$sql = "delete from usuario where ID=$id";
		mysqli_query($conexion, $sql);
	}
	
	if (isset($_GET['mod'])) {
		$id = $_GET['mod'];
		$sql = "select * from usuario where ID=$id";
		$modif = mysqli_query($conexion, $sql);
		$acambiar = mysqli_fetch_assoc($modif);
	}

	$rango_pag=5;
	if (isset($_GET["pagina"])) {
		if ($_GET["pagina"]==1) {
			header("location:usuarios.php");
	    } else {
		$pagina=$_GET["pagina"];
		}
	} else {
		$pagina=1;
	}
	$desde = ($pagina-1)*$rango_pag;
	$sql="select * from usuario";
	$resultado = mysqli_query($conexion, $sql);
	$cant_registros = mysqli_num_rows($resultado);
	$cant_pag = ceil($cant_registros/$rango_pag);


	$sql = "select * from usuario limit $desde, $rango_pag";
	$mostrar = mysqli_query($conexion, $sql);
?>

<html>
<head>
	<link href="estilo.css" rel="stylesheet" type="text/css">
	<title> RMV&C USUARIOS </title>
</head>
<body>
	<header>
		<H1> RMV&C MENU USUARIOS </H1>
	</header>
	<nav>
		<ul>
		  <li>  <a href="usuarios.php"> USUARIOS </a> </li>
		  <li>  <a href="proveedores.php"> PROVEEDORES </a> </li>
		  <li>  <a href="productos.php"> PRODUCTOS </a> </li>
		  <li>  <a href="clientes.php"> CLIENTES </a> </li>
		  
		</ul>
		
	</nav>
	<section>
		<form action="usuarios.php" method="post">
		  <H3> Gestión de usuarios </H3>
		  <?php if ($error==1) echo "<p id='error'> <b> ERROR - EL NOMBRE DE USUARIO O EMAIL YA EXISTE! </b> </p>"; ?>
		  <input type="hidden" name="ID" value="<?php if(isset($_GET['mod'])) echo $_GET['mod']; else echo '';?>" ></input>
		  Usuario <input type="text" name="detalle" placeholder="Nombre de usuario" autofocus required autocomplete="off"></input>	
          &nbsp;&nbsp;&nbsp;
		  Contraseña <input type="password" name="pass" placeholder="Contraseña" required></input>	
          &nbsp;&nbsp;&nbsp;		
		  Email <input type="text" name="email" placeholder="Email" required></input>
		  &nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <br><br>
		  <input type="submit" 
		  name="<?php if(isset($_GET['mod'])) echo 'actualizar'; else echo 'insertar';?>"
		  value="<?php if(isset($_GET['mod'])) echo 'Modificar'; else echo 'Crear';?>"
		  style='width:120px;height:20px'>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="button" name="cancelar" value="Cancelar" style='width:120px;height:20px' onClick="window.location.href = 'usuarios.php'">
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</form> 
		  <table border="2">
			<tr>
				<th>Id</th>
				<th>Nombre Usuario</th>
				<th>Email</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
		  <?php
			while ($fila=mysqli_fetch_assoc($mostrar)){
				echo "<tr>
						<td>".$fila['ID']."</td>
						<td>".$fila['detalle']."</td>
						<td>".$fila['email']."</td>
						<td><center><a href='usuarios.php?mod=".$fila['ID']."'><img src='modificar.jpg' width='30' height='25'></a></center></td>
						<td><center><a href=\"javascript:preguntar('".$fila['ID']."')\"><img src='eliminar.png' width='30'
					  </tr>";
			}
		  ?>
		  </table>
		  <?php
		    
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Pág.:  ";
			for ($i=1 ; $i<=$cant_pag ; $i++) {
				echo "<a href='?pagina=".$i."'>".$i."</a>  " ;
			}
			 
		  ?>
	</section>
	<script>
			function preguntar(valor) {
				rpta = confirm("Estas seguro de eliminar el usuario " + valor + "?");
				if (rpta) window.location.href = "usuarios.php?eliminar=" + valor;
			}
		  </script>
	<footer> 
		<p> ISP21 - TSDS - Programación </p>
	</footer>
</body>
</html>
