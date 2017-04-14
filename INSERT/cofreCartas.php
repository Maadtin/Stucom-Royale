<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Premio por registro</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
	<?php 

		session_start();

		require_once '../INDEX/masFunciones.php';

		if(!isset($_SESSION["temp_name"])) header("Location: ../INDEX/login.php");

		if(isset($_SESSION["temp_name"])) $username = $_SESSION["temp_name"];
		else header("Location ". $_SERVER["PHP_SELF"]);

		if(isset($_GET["result"])){

			$mensaje = $_GET["result"];

			switch ($mensaje) {
				case 1:
					$mensaje = "$username te has registrado correctamente :)";
					break;
				default:
					$mensaje = "Error al registrar el jugador";
			}
		

	?>
	<div class="mensaje" id="mensaje"><p><?php echo $mensaje ?></p></div>
	<?php  
		}
	?>
	<h1>Premio por registro</h1>
	<div class="contenedor-principal premio-extended">
		<p>Hola <?php echo $username ?></p>
		<p>Por haberte registrado has ganado la siguientes cartas para tu colección!</p>
		<ul>
		<?php 
			require_once 'cofreCartasLogica.php';

			foreach($cartasNameRandom as $cartas) {
			?>
			<li><?php echo $cartas ?></li>	
		<?php
			}


		 ?>

		</ul>
		<?php 

			for($i = 0; $i < count($cartasNameRandom); $i++) {

				if(tieneCartaUsuario($username, $cartasNameRandom[$i])) {

					subeNivelCarta($username, $cartasNameRandom[$i]);

					echo "<p>$username Te ha tocado la carta $cartasNameRandom[$i] más de una vez asi que se la ha subido en uno el nivel!</p>";

				} else {

					incorporaCarta($username, $cartasNameRandom[$i]);


				}

			}

		?>
			<p>Cartas añadidas a tu cuenta correctamente!</p>
		 <a class="volver-menu extended" href="../INDEX/logout.php">Logeate y disfruta de tus nuevas cartas aqui!</a>
	</div>
</body>
</html>


