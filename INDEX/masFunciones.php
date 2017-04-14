<?php 

require_once("conectar.php");
require_once("funcionesUsuario.php");

// Función que verificar si el usuario tiene ya la carta especifica o no
function tieneCartaUsuario($userName, $cartaName) {

	$con = conectar("royal");

	$sql = "SELECT user, card FROM deck WHERE user = '$userName' AND card = '$cartaName' ";

	$resultado = mysqli_query($con, $sql);

	$filas = mysqli_num_rows($resultado);

	desconectar($con);

	return ($filas > 0);

}


// Función que incorpora la carta al usuario
function incorporaCarta($userName, $cartaName){

	$con = conectar("royal");

	$sql = "INSERT INTO deck VALUES('$userName', '$cartaName', '1')";

	$resultado = mysqli_query($con, $sql);

	desconectar($con);

	return $resultado;

}

function subeNivelCarta($userName, $cartaName) {

	$con = conectar("royal");

	$sql = "UPDATE deck SET level = level + 1 WHERE user = '$userName' AND card = '$cartaName' ";

	$resultado = mysqli_query($con, $sql);

	desconectar($con);

	return $resultado;

}

function getTotalCartas() {

	$con = conectar("royal");

	$sql = "SELECT COUNT(*) AS TotalCartas FROM card ";

	$resultado = mysqli_query($con, $sql);

	$fila = mysqli_fetch_array($resultado);

	$numeroCartas = $fila["TotalCartas"];

	desconectar($con);

	return $numeroCartas;

}

function getNombreCartas() {

	$con = conectar("royal");

	$sql = "SELECT name FROM card";

	$resultado = mysqli_query($con, $sql);

	desconectar($con);

	return $resultado;

}

function getCartasByUsuario($userName) {

	$con = conectar("royal");

	$sql = "SELECT card FROM deck WHERE user = '$userName' ";

	$resultado = mysqli_query($con, $sql);	

	desconectar($con);

	return $resultado;

}

function getCartasAttrByName($cartaName) {

	$con = conectar("royal");

	$sql = "SELECT * FROM card WHERE name = '$cartaName' ";

	$resultado = mysqli_query($con, $sql);

	$fila = mysqli_fetch_array($resultado);

	desconectar($con);

	return $fila;

}


function aumentaVictoria($userName) {

	$con = conectar("royal");

	$sql = "UPDATE user SET wins = wins + 1 WHERE username = '$userName'";

	$resultado = mysqli_query($con, $sql);

	desconectar($con);

	return $resultado;



}

function rankingMejoresUsuarios() {

	$con = conectar("royal");

	$sql = "SELECT * FROM user ORDER BY level DESC, wins DESC";

	$resultado = mysqli_query($con, $sql);

	desconectar($con);

	return $resultado;


}



?>