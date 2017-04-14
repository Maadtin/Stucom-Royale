<?php 
		// traigo de bbdd el numero de cartas registradas
		$numeroCartas = getTotalCartas();
		$cartasName = getNombreCartas();
		// creo random del 0 al total de cartas que hay
		$cartasRandom = array();
		$arr = array();
		$cartasNameRandom = array();

		// creo array con 3 posiciones y relleno cada una de ellas con el numero random antes creado
		for($i = 0; $i < 3; $i++) {
			$random = rand(0, $numeroCartas-1);
			$arr[$i] = $random;
		}

		for($i = 0; $i < $numeroCartas; $i++) {
			$filas = mysqli_fetch_array($cartasName);
			$cartasRandom[$i] = $filas["name"];
		}

		for($i = 0; $i < 3; $i++) {
			// array definitivo kappa
			$cartasNameRandom[$i] = $cartasRandom[$arr[$i]];
		}
		
 ?>