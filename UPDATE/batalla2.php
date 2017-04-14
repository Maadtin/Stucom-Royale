<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Batalla 2</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
	<h1>Batalla Royale - Fase 2</h1>
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

			if(isset($_POST["fase1"])) {
				
				// RESULTADOS BATALLA 1
				$random = rand(0, 50);
				$selectedCard = $_POST["cartasBatalla1"];
				
				$fila = getCartasAttrByName($selectedCard);

				$nombreCarta = $fila["name"];
				$vidaCarta = $fila["hitpoints"];

				echo "<h2>Resultados de la fase 1</h2>";


				echo "<p>Vida de carta $nombreCarta : $vidaCarta</p>";
				echo "<p>Número escogido por la aplicación: $random</p>";

				if($random > $vidaCarta) echo "<p>Has perdido la fase 1 $username</p>";
				else {echo "<p>Has ganado la fase 1 $username</p>"; $_SESSION["wonBattles"] = 1;}
				//////////


			}
			?>
			
				<div class="form-container batalla">
				<form action="batalla3.php" method="post">
					<p class="fase">Fase 2 de la batalla</p>
					<label>Elige una carta de tu colección
					<select name="cartasBatalla2" id="cartasBatalla2" required>
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
					<script>document.getElementById('cartasBatalla2').value = "<?php echo $_POST['cartasBatalla2'];?>";</script>
					</label>	
						<input type="submit" value="Ver resultados de fase 2" name="fase2">
					</form>
				</div>
			</div>
</body>
</html>