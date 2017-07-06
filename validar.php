<?php
	session_start();


	include "funciones.php";
	include "autenticar.php";

	$conn = conectar();
	mysqli_set_charset($conn,"UTF8");
	
	$clase = new autenticar;

	try{
		$clase->autenticacion($conn);
	}
 	catch(Exception $e){
 		echo "Salto la excepción: ", $e->getMessage(),"\n";
 		$_SESSION["msg"] = $e->getMessage();
 	}


	desconectar($conn);

	if ($clase->estoyLogueado()){
		if($clase->esAdmin()){
			header("Location: backend.php?logueado=true");
		} else {
			header("Location: index.php?logueado=true");
		}
	} else{
		header("Location: logIn.php?logueado=false");
	}
?>