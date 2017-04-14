<!-- borra usuario -->
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
	<h1>Borrar usuarios</h1>
	<div class="contenedor-principal">
		<div class="form-container">
			<form action="borrarUsuario.php" method="post">
				<label>Hola <?php echo $username ?></label>
				<label for="">Selecciona usuario a borrar: 
					<select name="listaUsuarios" id="">
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
				<input type="submit" value="Borrar usuario" name="borrarUsuario">
			</form>
		</div>
			
		<?php 

				if(isset($_POST["borrarUsuario"])) {


					?>

					<div class="mensaje-errores">

					<?php

						$usuario = $_POST["listaUsuarios"];

						if(empty($usuario)) echo "<p class='error'>Especifica el usuario que quieres borrar por favor.</p>";
						else {

							$id = 3;
							if($result = borraUsuarioByName($usuario)) header("Location: ../INDEX/AdminHome.php?result=$id");
							
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
