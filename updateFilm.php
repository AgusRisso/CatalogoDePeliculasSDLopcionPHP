<?php
session_start();

include "funciones.php";
include "autenticar.php";

$clase = new autenticar;

if ($clase->estoylogueado() && $clase->esAdmin()){

	$ok = validarModificarPelicula();

	if($ok){

		$conn = conectar();
		mysqli_set_charset($conn,"UTF8");

		$modificado = modificarFilm($conn);

		desconectar($conn);


		if ($modificado){
			header("Location: backend.php?filmModificado=true");
		}
		else{
			header("Location: backend.php?filmModificado=false");
		}
	}
	else{
			if (isset($_POST["idPelicula"])){
				header("Location: editFilm.php?datosErroneosFilm=true&idPelicula=" . $_POST["idPelicula"]);
			}
			else{
				header("Location: backend.php?urlMal=true");		
			}
		}
}	
else{
	header("Location: index.php");
}
?>