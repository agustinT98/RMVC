<?php
	include ("verifica_sesion.php");

	include ("conectar.php");

	

	if (isset($_POST['insertar'])) {
		$n = $_POST['nombre'];
		$a = $_POST['apellido'];
		$t = $_POST['telefono'];
		$d = $_POST['dni'];
		$dom = $_POST['domicilio'];		
		$sql = "insert into clientes (Nombre, Apellido, Telefono, dni, domicilio) values ('$n','$a', '$t','$d', '$dom')";
		mysqli_query($conexion, $sql);
	
	}
	if (isset($_POST['actualizar'])) {
		$id = $_POST['ID'];
		$n = $_POST['nombre'];
		$a = $_POST['apellido'];
		$t = $_POST['telefono'];
		$d = $_POST['dni'];
		$dom = $_POST['domicilio'];
		$sql = "update clientes set Nombre='$n', Apellido='$a', Telefono='$t', dni='$d', domicilio=$dom where ID=$id";
		mysqli_query($conexion, $sql);
	}
	
	if (isset($_GET['eliminar'])) {
		$id = $_GET['eliminar'];
		$sql = "delete from clientes where ID=$id";
		mysqli_query($conexion, $sql);
	}
	
	if (isset($_GET['mod'])) {
		$id = $_GET['mod'];
		$sql = "select * from clientes where ID=$id";
		$modif = mysqli_query($conexion, $sql);
		$acambiar = mysqli_fetch_assoc($modif);
	}

	$rango_pag=5;
	if (isset($_GET["pagina"])) {
		if ($_GET["pagina"]==1) {
			header("location:clientes.php");
	    } else {
		$pagina=$_GET["pagina"];
		}
	} else {
		$pagina=1;
	}
	$desde = ($pagina-1)*$rango_pag;
	$sql="select * from clientes";
	$resultado = mysqli_query($conexion, $sql);
	$cant_registros = mysqli_num_rows($resultado);
	$cant_pag = ceil($cant_registros/$rango_pag);


	$sql = "select * from clientes limit $desde, $rango_pag";
	$mostrar = mysqli_query($conexion, $sql);
?>

<html>
<head>
	<link href="estilo.css" rel="stylesheet" type="text/css">
	<title> RMV&C CLIENTES </title>
</head>
<body>
	<header>
		<H1> RMV&C MENU CLIENTES </H1>
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
		<form action="clientes.php" method="post">
		  <H3> Gestión de clientes </H3>
		  
		  <input type="hidden" name="ID" value="<?php if(isset($_GET['mod'])) echo $_GET['mod']; else echo '';?>" ></input>
		  Nombre <input type="text" name="nombre" placeholder="Nombre del cliente" autofocus required></input>	
          &nbsp;&nbsp;&nbsp;
		  Apellido <input type="text" name="apellido" placeholder="Apellido" required></input>	
          &nbsp;&nbsp;&nbsp;		
		  Telefono <input type="tel" name="telefono" placeholder="telefono" required></input>
		  &nbsp;&nbsp;&nbsp;
		  DNI <input type="text" name="dni" placeholder="Ingrese nro de DNI" autofocus required></input>	
          &nbsp;&nbsp;&nbsp;
		  Domicilio <input type="text" name="domicilio" placeholder="Ingrese domicilio" autofocus required></input>	
          &nbsp;&nbsp;&nbsp;
		  <br><br>
		  <input type="submit" 
		  name="<?php if(isset($_GET['mod'])) echo 'actualizar'; else echo 'insertar';?>"
		  value="<?php if(isset($_GET['mod'])) echo 'Modificar'; else echo 'Crear';?>"
		  style='width:120px;height:20px'>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="button" name="cancelar" value="Cancelar" style='width:120px;height:20px' onClick="window.location.href = 'clientes.php'">
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</form> 
		  <table border="2">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Telefono</th>
				<th>DNI</th>
				<th>Domicilio</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
		  <?php
			while ($fila=mysqli_fetch_assoc($mostrar)){
				echo "<tr>
						<td>".$fila['ID']."</td>
						<td>".$fila['Nombre']."</td>
						<td>".$fila['Apellido']."</td>
						<td>".$fila['Telefono']."</td>
						<td>".$fila['dni']."</td>
						<td>".$fila['domicilio']."</td>
						<td><center><a href='clientes.php?mod=".$fila['ID']."'><img src='modificar.jpg' width='30' height='25'></a></center></td>
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
				rpta = confirm("Estas seguro de eliminar el cliente " + valor + "?");
				if (rpta) window.location.href = "clientes.php?eliminar=" + valor;
			}
		  </script>
	<footer> 
		<p> ISP21 - TSDS - Programación </p>
	</footer>
</body>
</html>
