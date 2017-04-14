<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resultados</title>
	<link rel="stylesheet" href="../INDEX/index.css">
</head>
<body>
	<h1>Resultados de la batalla</h1>
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
			
			<?php
			


			if(isset($_POST["fase3"])) {

				$selectedCard = $_POST["cartasBatalla3"];
				
				$fila = getCartasAttrByName($selectedCard);

				$r = rand(0, 10);

				$nombreCarta = $fila["name"];
				$elixirCarta = $fila["cost"];

				echo "<h2>Resultados de la fase 3</h2>";


				echo "<p>Coste de elixir de la carta $nombreCarta : $elixirCarta</p>";
				echo "<p>Coste de elixir de la carta de la aplicación: $r</p>";

				if($r > $elixirCarta) echo "<p>Has perdido la fase 3 $username</p>";
				else {echo "<p>Has ganado la fase 3 $username</p>"; $_SESSION["wonBattles"]++;}


				echo "<h3>Fases ganadas: ".$_SESSION["wonBattles"]."</h3>";

				if($_SESSION["wonBattles"] > 1) {

					strtoupper($username);

					echo "<h1 class='winner'>$username HAS GANADO LA BATALLA</h1>";
					aumentaVictoria($username);
					if(isset($_SESSION["admin"])){

						echo "<a class='volver-menu ext-batalla' href='../INDEX/AdminHome.php'>Volver al menu</a>";
					}elseif(isset($_SESSION["user"])) {
						echo "<a class='volver-menu ext-batalla' href='../INDEX/userHome.php'>Volver al menu</a>";
					}

					}else {

						echo "<h1 class='loser'>LA APLICACIÓN GANA LA BATALLA :(</h1>";
				}


			}




	 ?>
	</div>
</body>
</html>