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
		<form action="" method="post">
			<label>Nombre de usuario <input type="text" name="username" id="username"></label>
			<script>document.getElementById('username').value = "<?php echo $_POST['username'];?>";</script>
			<label>Contraseña <input type="password" name="pass1" id="pass1"></label>
			<script>document.getElementById('pass1').value = "<?php echo $_POST['pass1'];?>";</script>
			<label>Confirmar contraseña <input type="password" name="pass2" id="pass2"></label>
			<script>document.getElementById('pass2').value = "<?php echo $_POST['pass2'];?>";</script>
			<input type="submit" value="Registrar jugador" name="registrar">

		</form>
	
		<?php 

			if(isset($_POST["registrar"])){

				require_once("../INDEX/funcionesUsuario.php");

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

					if(existeUsuario($username, $pass1)) {
					"Usuario ya existe en la base de datos";

					} 
					else {

						if($pass1 != $pass2){

							echo "<p>Las contraseñas deben de coincidir.</p>";

						} else {
							registrarUsuario($username, $pass1);
						}

					}

				}

			}

			


		?>
		</div>
	</body>
	</html>