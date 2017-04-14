<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<h1>Login de jugador</h1>
	<div class="contenedor-principal">
		<div class="form-container">
			<form action="" method="post">
				<label>Nombre de usuario: <input type="text" name="user" id="user"></label>
				<script>document.getElementById('user').value = "<?php echo $_POST['user'];?>";</script>
				<label>Contraseña : <input type="password" name="pass" id="pass"></label>
				<script>document.getElementById('pass').value = "<?php echo $_POST['pass'];?>";</script>
				<input type="submit" name="login" value="Login">
			</form>
		</div>

	<?php
	
			if(isset($_POST["login"])){

				echo '<div class="mensaje-errores">';

				echo '<a class="volver-menu" href="../INDEX/index.php">Volver al menu</a>';

				require_once 'funcionesUsuario.php';

				// Recogemos datos del formulario
				$username = $_POST["user"];
				$pass = $_POST["pass"];


				if(empty($username)){
					echo "<p class='error'>Rellena el campo nombre de usuario.</p>";
				}

				if(empty($pass)){
					echo "<p class='error'>Rellena el campo contraseña.</p>";
				}

				else if(!empty($username) && !empty($pass)){
						
					if(existeUsuario($username, $pass)){

						session_start();
						
						$tipo = getTipoUsuario($username);
		
						switch($tipo){

							case 0:							
								$_SESSION["user"] = $username;
								header("Location: UserHome.php");
							break;

							case 1:
								$_SESSION["admin"] = $username;
								header("Location: AdminHome.php");
							break;
				
							default:
								echo "<p>Tipo de usuario incorrecto</p>";

						}
					
					}

					else {
						echo "<p class='error'>Nombre o contraseña incorrectos.</p>";
					}

				}

				echo '</div>';

			}
	?>
		
	</div>
</body>
</html>