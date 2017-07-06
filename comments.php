<?php
	session_start();
	include "funciones.php";

	$conn = conectar();
	mysqli_set_charset($conn,"UTF8");

	$creado = crearComentario($conn);

	desconectar($conn);

	if ($creado){
		header("Location: film.php?comentario=true&idPelicula=" . $_POST["idPelicula"]);
	}
	else{
		header("Location: film.php?comentario=false&idPelicula=" . $_POST["idPelicula"]);
	}
?>