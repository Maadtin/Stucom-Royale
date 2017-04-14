<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Batalla 3</title>
</head>
<body>
	<h1>Batalla Royale - Fase 3</h1>
	<link rel="stylesheet" href="../INDEX/index.css">
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
			<div class="contenedor-principal">
				<?php 
					if(isset($_POST["fase2"])) {
					// RESULTADOS BATALLA 2
					$selectedCard = $_POST["cartasBatalla2"];
					
					$fila = getCartasAttrByName($selectedCard);

					$categorias = array("Común", "Especial", "Épica", "Legendaria");
					$r = rand(0, count($categorias)-1);

					$nombreCarta = $fila["name"];
					$typeCarta = $fila["rarity"];

					echo "<h2>Resultados de la fase 2</h2>";

					echo "<p>Categoria de la carta $nombreCarta : $typeCarta</p>";
					echo "<p>Categoria de la carta de la aplicación: $categorias[$r]</p>";

					if($categorias[$r] != $typeCarta) echo "<p>Has perdido la fase 2 $username</p>";
					else {echo "<p>Has ganado la fase 2 $username</p>"; $_SESSION["wonBattles"]++;}
					///////////////////////
			
					}


				 ?>
				<div class="form-container batalla">
					<form action="batalla-resultados.php" method="post">
						<p class="fase">Fase 3 de la batalla</p>
						<label>Elige una carta de tu colección
						<select name="cartasBatalla3" id="cartasBatalla3">
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
						<script>document.getElementById('cartasBatalla3').value = "<?php echo $_POST['cartasBatalla3'];?>";</script>
						</label>	
						<input type="submit" value="Ver resultados de fase 3" name="fase3">
					</form>
				</div>
			</div>
</body>
</html>