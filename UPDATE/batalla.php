<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Batalla</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
	<h1>Batalla Royale - Fase 1</h1>
	<div class="contenedor-principal">
		<?php 
			session_start();

			require_once '../INDEX/funcionesUsuario.php';
			require_once '../INDEX/masFunciones.php';

			if(!$_SESSION){
			header("Location: login.php");
			}

			if(isset($_SESSION["user"])) $username = $_SESSION["user"];
			elseif(isset($_SESSION["admin"])) $username = $_SESSION["admin"];
		
			?>
			<div class="form-container batalla">
				<form action="batalla2.php" method="post">
					<p class="usuario-nom">Hola <?php echo $username ?></p>
					<p class="fase">Fase 1 de la batalla</p>	
					<label>Elige una carta de tu colección
						<select name="cartasBatalla1" id="cartasBatalla1" required>
							<option value="">- - -</option>
							<?php 
							
							$resultado = getCartasByUsuario($username);
							while($filas = mysqli_fetch_array($resultado)){								
							?>		
							
								<option value="<?php echo $filas['card'] ?>"><?php echo $filas["card"] ?></option>

							<?php
								} 
							?>
							
						</select>
						<script>document.getElementById('cartasBatalla1').value = "<?php echo $_POST['cartasBatalla1'];?>";</script>
					</label>	
					<input type="submit" value="Ver resultados de fase 1" name="fase1">
				</form>		
	 	</div>
	 </div>
</body>
</html>