<?php 
	
	// FUNCIÓN PARA CONECTAR A LA BASE DE DATOS.
	function conectar($database){


		$conexion = mysqli_connect("localhost", "root", "", "$database") or die ("No se ha podido conectar con la BBDD");

		return $conexion;
	}

	// FUNCIÓN PARA DESCONECTAR DE LA BASE DE DATOS.
	function desconectar($conexion){

		mysqli_close($conexion);

	}


?>