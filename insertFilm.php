<?php
	session_start();
	include "funciones.php";
	include "autenticar.php";

	$clase = new autenticar;

	if ($clase->estoylogueado() && $clase->esAdmin()){

		$ok = validarInsertarPelicula();

		if($ok){

			$conn = conectar();
			mysqli_set_charset($conn,"UTF8");

			$creado = insertarPelicula($conn);

			desconectar($conn);

			if ($creado){
				header("Location: backend.php?filmCreado=true");
			}
			else{
				header("Location: createFilm.php?filmCreado=false");
			}
		}
		else{
			header("Location: createFilm.php?datosErroneosFilm=true");
		}
	}
	else{
		header("Location: index.php");
	}
?>