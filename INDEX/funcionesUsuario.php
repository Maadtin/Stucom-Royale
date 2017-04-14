<?php 
	
	require_once("conectar.php");

	function existeNombreUsuario($userName){

		$con = conectar("royal");

		$sql = "SELECT username FROM user WHERE username = '$userName' ";

		$resultado = mysqli_query($con, $sql);

		$filas = mysqli_num_rows($resultado);

		return ($filas > 0);
	}

	function existeUsuario($userName, $userPass){

		$con = conectar("royal");

		$sql = "SELECT username, password FROM user WHERE username = '$userName' and password = '$userPass' ";

		$resultado = mysqli_query($con, $sql);

		$filas = mysqli_num_rows($resultado);

		return ($filas > 0);

	}


	function getTipoUsuario($userName){

		$con = conectar("royal");

		$sql = "SELECT type FROM user WHERE username = '$userName'";

		$resultado = mysqli_query($con, $sql);

		$fila = mysqli_fetch_array($resultado);

		$tipo = $fila['type'];

		return $tipo;

	}

	function registrarUsuario($userName, $userPass){

		$con = conectar("royal");

		$sql = "INSERT INTO user VALUES('$userName', '$userPass', 0, 0, 1)";

		$resultado = mysqli_query($con, $sql);

		return $resultado;

	}

	function selectAllUsuarios(){

		$con = conectar("royal");

		$sql = "SELECT * FROM user WHERE type != 1 ";

		$resultado = mysqli_query($con, $sql);

		return $resultado;

	}

	function selectDatosUsuario($userName){

		$con = conectar("royal");

		$sql = "SELECT username, password FROM user WHERE username = '$userName' ";

		$resultado = mysqli_query($con, $sql);

		$datos = mysqli_fetch_array($resultado);

		return $datos;

	}

	function modificaDatosUsuario($userName, $oldPass, $newPass){

		$con = conectar("royal");

		$sql = "UPDATE user SET password = '$newPass' WHERE username = '$userName' AND password = '$oldPass' ";

		$resultado = mysqli_query($con, $sql);

		return $resultado;

	}

	function selectAllDatosUsuario($userName) {

		$con = conectar("royal");

		$sql = "SELECT * FROM user WHERE username = '$userName' ";

		$resultado = mysqli_query($con, $sql);

		return $resultado;
	}


	// Alta de cartas

	function existeCarta($nomCarta) {
		
		$con = conectar("royal");

		$sql = "SELECT name FROM card WHERE name = '$nomCarta' ";

		$resultado = mysqli_query($con, $sql);

		$filas = mysqli_num_rows($resultado);

		return ($filas > 0);

	}

	function registraCarta($nomCarta, $tipoCarta, $calidadCarta, $vidaCarta, $danoCarta, $elixirCarta) {

		$con = conectar("royal");

		$sql = "INSERT INTO card VALUES('$nomCarta', '$tipoCarta', '$calidadCarta', '$vidaCarta', '$danoCarta', '$elixirCarta')";

		$resultado = mysqli_query($con, $sql);

		return $resultado;

	}


	function borraUsuarioByName($userName) {

		$con = conectar("royal");

		$sql = "DELETE FROM user WHERE username = '$userName' ";

		$resultado = mysqli_query($con, $sql);

		return $resultado;

	}

	function selectCartas() {

		$con = conectar("royal");

		$sql = "SELECT * FROM card";

		$resultado = mysqli_query($con, $sql);

		return $resultado;

	}




 ?>