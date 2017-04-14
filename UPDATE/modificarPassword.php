<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
	<h1>Modificación de password</h1>
	<div class="contenedor-principal">
		<div class="form-container">
			<form action="" method="post">
				<?php 
					session_start();

					require_once '../INDEX/funcionesUsuario.php';

					if(!$_SESSION){
					header("Location: login.php");
					}

					if(isset($_SESSION["user"])) $username = $_SESSION["user"];
					elseif(isset($_SESSION["admin"])) $username = $_SESSION["admin"];

	
					//recoge campo contraseña dependiendo del nombre de usuario de sesión para despúes poder validarla.
					$resultado = selectDatosUsuario($username);
					$currentPass = $resultado["password"];

					?>
					<label>Hola <?php echo $username ?></label>
					<label>Contraseña actual: <input type="password" name="oldPass" id="oldPass"> <label class="showPass"><input type="checkbox" id="box"><span>Mostrar contraseña</span></label></label>
					<script>document.getElementById('oldPass').value = "<?php echo $_POST['oldPass'];?>";</script>
					<label>Nueva contraseña: <input type="password" name="newPass"></label>
					<label>Confirma nueva contraseña: <input type="password" name="confirmNewPass"></label>
					<input type="submit" value="Modificar" name="modificar">

			</form>
	<script>
				let input = document.getElementById('oldPass'),
				    box = document.getElementById('box'),
				    label = document.querySelector('.showPass'),
				    labeltxt = label.querySelector('span');
				    box.addEventListener('change', function(){
				    	input.type = this.checked ? "text" : "password";
				    	labeltxt.textContent = this.checked ? "Esconder contraseña" : "Mostrar contraseña";

				    })
	</script>
		</div>
			<?php 

				if(isset($_POST["modificar"])) {

						echo '<div class="mensaje-errores">';

						echo '<a class="volver-menu" href="javascript:window.history.go(-2)">Volver al perfil</a>';

						$oldPass = $_POST["oldPass"];
						$newPass = $_POST["newPass"];
						$confirmNewPass = $_POST["confirmNewPass"];

						if(empty($oldPass)) echo "<p class='error'>Campo contraseña actual es obligatorio.</p>";
						if(empty($newPass)) echo "<p class='error'>Campo nueva contraseña es obligatorio.</p>";
						if(empty($confirmNewPass)) echo "<p class='error'>Campo confirmar nueva contraseña es obligatorio.</p>";
						else if(!empty($oldPass) && !empty($newPass) && !empty($confirmNewPass)) {
							// validar si la contraseña actual es correcta antes de hacer todo lo siguiente
							if($oldPass != $currentPass ) echo "<p class='error'>La contraseña actual es incorrecta.</p>";
							else {

								if($newPass != $confirmNewPass) echo "<p class='error'>Campo nueva contraseña y confirma nueva contraseña no coinciden.</p>";
								else {

									$id = 2;

									(modificaDatosUsuario($username, $oldPass, $newPass)) ? header("Location: ../INDEX/AdminHome.php?result=$id") : "error" . mysqli_error($con); 
								}


								
							}


						}

					}

						echo '</div>';
			?>
	</div>
</body>
</html>
