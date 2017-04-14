<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mejores jugador</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
	<h1>Ranking de mejores jugadores</h1>
	<div class="contenedor-principal">
		<?php 

			require_once "../INDEX/masFunciones.php";

			session_start();

			if(!$_SESSION){
			header("Location: login.php");
			}

			else if(!$_SESSION["admin"]){

				header("Location:".$_SERVER['PHP_SELF']);

			}

			$username = $_SESSION['admin'];

			echo "<p class='usuario-nom'>Hola $username</p>";


			$resultado = rankingMejoresUsuarios();

		?>
		
		<table>

			<tr>
				<td>Nombre de usuario</td>
				<td>Contraseña</td>
				<td>Tipo de usuario</td>
				<td>Victorias</td>
				<td>Nivel</td>
			</tr>
		
		<?php

			while($filas = mysqli_fetch_array($resultado)){

		?>
			<tr>
				<td><?php echo $filas["username"]; ?></td>
				<td><?php echo $filas["password"]; ?></td>
				<td><?php echo $filas["type"]; ?></td>
				<td><?php echo $filas["wins"]; ?></td>
				<td><?php echo $filas["level"]; ?></td>
			</tr>

		<?php 
		 	} // cierra while
		?>

		</table>
			
			<a href="../INDEX/AdminHome.php">Volver</a>
	</div>
</body>
</html>