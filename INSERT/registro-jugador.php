	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registro jugadores</title>
		<link rel="stylesheet" href="../INDEX/index.css">
	</head>
	<body>
		<h1>Registro jugadores</h1>
		<div class="contenedor-principal">
		<div class="form-container">
		<form action="" method="post">
			<label>Nombre de usuario <input type="text" name="username" id="username"></label>
			<script>document.getElementById('username').value = "<?php echo $_POST['username'];?>";</script>
			<label>Contraseña <input type="password" name="pass1" id="pass1"></label>
			<script>document.getElementById('pass1').value = "<?php echo $_POST['pass1'];?>";</script>
			<label>Confirmar contraseña <input type="password" name="pass2" id="pass2"></label>
			<script>document.getElementById('pass2').value = "<?php echo $_POST['pass2'];?>";</script>
			<input type="submit" value="Registrar jugador" name="registrar">

		</form>
		</div>
		
		<?php 

			if(isset($_POST["registrar"])){
echo '<div class="mensaje-errores">';
				

				require_once("../INDEX/funcionesUsuario.php");

				echo '<a class="volver-menu" href="../INDEX/index.php">Volver al menu</a>';

				$username = $_POST["username"];
				$pass1 = $_POST["pass1"];
				$pass2 = $_POST["pass2"];


				if(empty($username)){
					echo "<p class='error'>Rellena el campo nombre de usuario.</p>";
				}

				if(empty($pass1)){
					echo "<p class='error'>Rellena el campo contraseña.</p>";
				}

				if(empty($pass2)){
					echo "<p class='error'>Rellena el campo confirmar contraseña</p>";
				}


				else if(!empty($username) && !empty($pass1) && !empty($pass2)){

					$existeUsername = existeNombreUsuario($username);
					if($existeUsername) {

						echo "<p class='error'>Ese nombre de usuario ya está registrado.</p>";

					} 
					else {

						if($pass1 != $pass2){

							echo "<p class='error'>Las contraseñas deben de coincidir.</p>";

						} else {


							if(registrarUsuario($username, $pass1)){
								session_start();
								$_SESSION["temp_name"] = $username;
								$id = 1;
								header("Location: ../INSERT/cofreCartas.php?result=$id");
							}
						}

					}

				}

				echo '</div>';

			}

			


		?>
			
		</div>
	</body>
	</html>