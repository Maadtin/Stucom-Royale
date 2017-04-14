<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
	<h1>Datos de perfil de usuario</h1>
	<div class="contenedor-principal">
		<?php 

			require_once "../INDEX/funcionesUsuario.php";

			session_start();

			if(!$_SESSION){
			header("Location: login.php");
			}

			else if(!$_SESSION["user"]){

				header("Location:".$_SERVER['PHP_SELF']);

			}

			$username = $_SESSION['user'];

			echo "<p class='usuario-nom'>Hola $username</p>";


			$resultado = selectAllDatosUsuario($username);

		?>
		
		<table>

			<tr>
				<td>Número victorias</td>
				<td>Nivel de jugador</td>
			</tr>
		
		<?php

			while($filas = mysqli_fetch_array($resultado)){

		?>
			<tr>
				<td><?php echo $filas["wins"]; ?></td>
				<td><?php echo $filas["level"]; ?></td>
			</tr>

		<?php 
		 	} // cierra while
		?>

		</table>
			
			<a href="../INDEX/userHome.php">Volver</a>
	</div>
</body>
</html>