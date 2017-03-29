<?php 
	
	require_once("conectar.php");

	function existeUsuario($userName, $userPass){

		$con = conectar("royal");

		$sql = "SELECT * FROM user WHERE username = '$userName' and password = '$userPass' ";

		$resultado = mysqli_query($con, $sql);

		$filas = mysqli_num_rows($resultado);

		return ($filas > 0) ? true : false;

	}

	function registrarUsuario($userName, $userPass){

		$con = conectar("royal");

		$sql = "INSERT INTO user VALUES('$userName', '$userPass', 0, 0, 1)";

		$resultado = mysqli_query($con, $sql);

		return $resultado;

	}


 ?>