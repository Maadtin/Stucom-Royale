<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Página de usuario</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<h1>Pagina de usuario</h1>
	<div class="contenedor-principal">
		<?php 

			session_start();

			if(!$_SESSION){
			header("Location: login.php");
			}

			elseif(!isset($_SESSION["user"])){

				header('Location: AdminHome.php');

			}

			$username = $_SESSION['user'];

		 ?>
		 <p class="usuario-nom">Hola <?php echo $username; ?></p>
		 <a href="../SELECT/verPerfil.php">ver Perfil</a>
		 <a href="../UPDATE/modificarPassword.php">Modificar password</a>
		 <a href="../UPDATE/batalla.php">Batalla</a>
		 <a name="cerrar" href="logout.php?cerrar=1">Cerrar sesion</a>
	</div>
</body>
</html>