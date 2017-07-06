<?php	
	session_start();

	include "funciones.php";
	include "autenticar.php";

	$ok = validarUsuario();

	if ($ok) {

		$conn = conectar();
		mysqli_set_charset($conn,"UTF8");

		$creado = insertarUsuario($conn);

		if ($creado){

			$clase = new autenticar;

			$logueado = $clase->autenticacion($conn);
			
			if ($logueado){
				if (isset($_SESSION['user'])){
					header("Location: index.php?creado=true&logueado=true");
				} else {
					header("Location: index.php?creado=true&logueado=false");
				}
			}
		}
		else{
			header("Location: signIn.php?creado=false");
		}

		desconectar($conn);
	}
	else{
		echo "falso";
		header("Location: signIn.php?datosErroneos=false");
	}
?>