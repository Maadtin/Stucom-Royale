<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Página de Admin</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<?php 
		// Quita el notice al entrar al index ya que la variable $_GET no tiene un valor
		error_reporting(E_ALL ^ E_NOTICE);

		if(isset($_GET["result"])){

			$mensaje = $_GET["result"];
			$usuario = $_GET["n"];
			$carta = $_GET["c"];

			switch ($mensaje) {
				case 1:
					$mensaje = "Carta registrada exitosamente :)!";
					break;
				case 2:
					$mensaje = "Contraseña modificada exitosamente :)!";
					break;
				case 3:
					$mensaje = "Usuario borrado exitosamente :)!";
					break;
				case 4:
					$mensaje = "El usuario $usuario ya tenia la carta en su mazo por lo tanto se ha subido el nivel de $carta en 1 :)!";
					break;
				case 5:
					$mensaje = "Carta incorporada exitosamente :)!";
					break;
			}

		
		

	?>
	<div class="mensaje" id="mensaje"><p><?php echo $mensaje ?></p></div>
	<?php
	}
	?>
	<h1>Pagina de administrador</h1>
	<div class="contenedor-principal">
		<?php 
			session_start();

			if(!$_SESSION){
			header("Location: login.php");
			}

			elseif(!isset($_SESSION["admin"])){

				header('Location: userHome.php');

			}

			$username = $_SESSION['admin'];

		?>
		<p class="usuario-nom">Hola <?php echo $username; ?></p>
		<a href="../INSERT/altaCartas.php">Alta de cartas</a>
		<a href="../UPDATE/modificarPassword.php">Modificar password</a>
		<a href="../UPDATE/batalla.php">Batalla</a>
		<a href="../SELECT/mejoresJugadores.php">Ranking mejores usuarios</a>
		<a href="../DELETE/borrarUsuario.php">Borrar un usuario</a>
		<a href="../INSERT/incorporarCarta.php">Incorporar carta a un usuario</a>
		<a href="logout.php">Cerrar sesion</a>
	</div>
</body>
</html>