<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alta de cartas</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
	<h1>Alta de cartas</h1>
	<div class="contenedor-principal">
		<div class="form-container">
			<form action="altaCartas.php" method="post">
				<label>Nombre de carta (Máximo 30 carácteres): <input type="text" name="nombreCarta" id="nombreCarta" maxlength="30"></label>
				<script>document.getElementById('nombreCarta').value = "<?php echo $_POST['nombreCarta'];?>";</script>
				<label>
					Selecciona el tipo de carta:
					<select name="tipoCarta" id="tipoCarta">
						<option value="">---</option>
						<option value="tropa">Tropa</option>
						<option value="hechizo">Hechizo</option>
						<option value="estructura">Estructura</option>
					</select>
				</label>
				<script>document.getElementById('tipoCarta').value = "<?php echo $_POST['tipoCarta'];?>";</script>
				<label>
					Selecciona la calidad de la cara:
					<select name="calidadCarta" id="calidadCarta">
						<option value="">---</option>
						<option value="comun">Común</option>
						<option value="especial">Especial</option>
						<option value="epica">Épica</option>
						<option value="Legendaria">Legendaria</option>
					</select>
				</label>
				<script>document.getElementById('calidadCarta').value = "<?php echo $_POST['calidadCarta'];?>";</script>
				<label>Vida (Valores entre 1 y 20): <input type="number" min="1" max="20" name="vidaCarta" id="vidaCarta"></label>
				<script>document.getElementById('vidaCarta').value = "<?php echo $_POST['vidaCarta'];?>";</script>
				<label>Daño (Valores entre 1 y 20): <input type="number" min="1" max="20" name="danoCarta" id="danoCarta"></label>
				<script>document.getElementById('danoCarta').value = "<?php echo $_POST['danoCarta'];?>";</script>
				<label>Coste de elixir (Valores entre 1 y 10): <input type="number" min="1" max="10" name="elixirCarta" id="elixirCarta"></label>
				<script>document.getElementById('elixirCarta').value = "<?php echo $_POST['elixirCarta'];?>";</script>
				<input type="submit" value="Alta"  name="creaCarta">
			</form>
		</div>

		<?php 

			if(isset($_POST["creaCarta"])) {

				require_once '../INDEX/funcionesUsuario.php';



				$nombreCarta = $_POST["nombreCarta"];
				$tipoCarta = $_POST["tipoCarta"];
				$calidadCarta = $_POST["calidadCarta"];
				$vidaCarta = $_POST["vidaCarta"];
				$danoCarta = $_POST["danoCarta"];
				$elixirCarta = $_POST["elixirCarta"];
		?>
			<div class="mensaje-errores">

		<?php 
				if(empty($nombreCarta)) echo "<p class='error'>El campo nombre de carta es obligatorio.</p>";
				if(empty($tipoCarta)) echo "<p class='error'>El campo tipo de carta es obligatorio.</p>";
				if(empty($calidadCarta)) echo "<p class='error'>El campo calidad de carta es obligatorio.</p>";
				if(empty($vidaCarta)) echo "<p class='error'>El campo vida de carta es obligatorio.</p>";
				if(empty($danoCarta)) echo "<p class='error'>El campo daño de carta es obligatorio.</p>";	
				if(empty($elixirCarta)) echo "<p class='error'>El campo coste de elixir es obligatorio.</p>";
				elseif(!empty($nombreCarta) && !empty($tipoCarta) && !empty($calidadCarta) && !empty($vidaCarta) && !empty($danoCarta) && !empty($elixirCarta)) {

					$existeCarta = existeCarta($nombreCarta);
					if($existeCarta) {
						echo "<p class='error'>Ese nombre de carta ya esta registrado.</p>";
					}
					else {
						registraCarta($nombreCarta, $tipoCarta, $calidadCarta, $vidaCarta, $danoCarta, $elixirCarta);
						$id = 1;
						header("Location: ../INDEX/AdminHome.php?result=$id");
					}
				}
		?>
			<a class="volver-menu" href="../INDEX/index.php">Volver al menu</a>
			</div>
		
		<?php
			}// Cierra isset
		?>
	</div>
</body>
</html>