<?php
	session_start();
	include "funciones.php";
	include "autenticar.php";

	$clase = new autenticar;

	if ($clase->estoylogueado() && $clase->esAdmin()){

		if(isset($_GET["idPelicula"])){
			$conn = conectar();
			mysqli_set_charset($conn,"UTF8");

			$eliminar = eliminarPelicula($conn);

			desconectar($conn);

			if ($eliminar){
				header("Location: backend.php?filmEliminado=true");
			}
			else{
				header("Location: backend.php?filmEliminado=false");
			}
		}
		else{
			header("Location: backend.php?urlMal=true");
		}
	}
	else{
		header("Location: index.php");
	}
?>