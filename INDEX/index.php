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

		$mensaje = $_GET["result"];

		switch ($mensaje) {
			case 1:
				$mensaje = "Jugador registro correctamente";
				break;
			default:
				$mensaje = "Error al registrar el jugador";
		}

	?>
	<h1>Stucom Royale</h1>
	<div class="mensaje"><?php echo $mensaje ?></div>

	<div class="contenedor-menu">
		<a href="../INSERT/registro-jugador.php">Registro jugadores</a>
		<a href=""></a>
		<a href=""></a>
		<a href=""></a>
		<a href=""></a>
	</div>
</body>
</html>