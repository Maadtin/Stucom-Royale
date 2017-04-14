<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stucom Royale</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<?php 

		// Quita el notice al entrar al index ya que la variable $_GET no tiene un valor
		error_reporting(E_ALL ^ E_NOTICE);

		if(isset($_GET["result"])){

			$mensaje = $_GET["result"];

			switch ($mensaje) {
				case 1:
					$mensaje = "Jugador registrado correctamente :)";
					break;
				default:
					$mensaje = "Error al registrar el jugador";
			}
		

	?>
	<div class="mensaje" id="mensaje"><p><?php echo $mensaje ?></p></div>
	<?php  
		}
	?>
	<h1>Stucom Royale</h1>
	<div class="contenedor-menu">
		<a href="../INSERT/registro-jugador.php">Registro</a>
		<a href="login.php">Login</a>
	</div>
</body>
</html>
<script>
	
		var div = document.querySelector('.mensaje');
		

		// setInterval(function(){
		// 	var date = new Date();
		// 	seconds = date.getMilliseconds();
		// 	console.log(seconds);
		// 	div.style.opacity = i;
		// 	i--;
		// }, 1000);


</script>