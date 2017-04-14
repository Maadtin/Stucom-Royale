<?php 
	


		if(!isset($_GET["cerrar"])) {

			header("Location:".$_SERVER["PHP_SELF"]);
		}
			

		session_start();
		session_destroy();
		header("Location: index.php");



 ?>