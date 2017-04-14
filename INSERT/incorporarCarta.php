<!-- incorporar carta -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Borrar usuarios</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
<?php 
		session_start();

			if(!$_SESSION){
			header("Location: login.php");
			}

			else if(!$_SESSION["admin"]){

				header("Location:".$_SERVER['PHP_SELF']);

			}

			$username = $_SESSION['admin'];


 ?>
	<h1>Incorporar cartas a los usuarios</h1>
	<div class="contenedor-principal">
		<div class="form-container">
			<form action="incorporarCarta.php" method="post">
				<label>Hola <?php echo $username ?></label>
				<label for="">Selecciona usuario a incorporar carta: 
					<select name="listaUsuarios" id="listaUsuarios">
						<option value="">- - -</option>
						<?php 
							require_once '../INDEX/funcionesUsuario.php';

							$listaUsuarios = selectAllUsuarios();

							while ($filas = mysqli_fetch_array($listaUsuarios)) {
								
								echo "<option value='".$filas['username']."'>".$filas["username"]."</option>";
							}


						 ?>
					</select>
				</label>
				<script>document.getElementById('listaUsuarios').value = "<?php echo $_POST['listaUsuarios'];?>";</script>
				<label for="">Selecciona carta a incorporar: 
					<select name="listaCartas" id="listaCartas">
						<option value="">- - -</option>
						<?php 

							$listaCartas = selectCartas();

							while ($filas = mysqli_fetch_array($listaCartas)) {
								
								echo "<option value='".$filas['name']."'>".$filas["name"]."</option>";
							}


						 ?>
					</select>
				</label>
				<script>document.getElementById('listaCartas').value = "<?php echo $_POST['listaCartas'];?>";</script>
				<input type="submit" value="Dar carta" name="darCarta">
			</form>
		</div>
		<?php 

				if(isset($_POST["darCarta"])) {


					?>

					<div class="mensaje-errores">

					<?php

						$usuario = $_POST["listaUsuarios"];
						$carta = $_POST["listaCartas"];

						if(empty($usuario)) echo "<p class='error'>Especifica el usuario al que le quieres incorporar la carta por favor.</p>";
						if(empty($carta)) echo "<p class='error'>Especifica la carta que quieres incorporar al usuario por favor.</p>";
						else if(!empty($usuario) && !empty($carta)) {

							require_once '../INDEX/masFunciones.php';
							if(tieneCartaUsuario($usuario, $carta)) {

									$id = 4;
									// Llama a función que sube en 1 el nivel de la carta
									if(subeNivelCarta($usuario, $carta)) header("Location: ../INDEX/AdminHome.php?result=$id&&n=$usuario&&c=$carta");

							}else {

									$id= 5;

								if(incorporaCarta($usuario, $carta)) header("Location: ../INDEX/AdminHome.php?result=$id");

							}


						}

					?>
						<a class="volver-menu" href="../INDEX/AdminHome.php">Volver al perfil</a>
					</div>
				<?php

				}

		 		?>		
	</div>
</body>
</html>
