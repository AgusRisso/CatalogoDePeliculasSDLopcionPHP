<?php 
	class autenticar
	{
		
		function autenticacion($conn)
		{
			if(!isset($_POST["user"])){
				throw new Exception("El usuario no fue ingresado");
				return false;
			}else{
				if ($_POST["user"] == "") {
					throw new Exception("El usuario es vacio, ingrese uno");
					return false;
				}
				else{
					if(strlen($_POST["user"]) < 6){
						throw new Exception("El usuario es demasiado corto, debe tener 6 caracteres como m&iacute;nimo");
						return false;
					}
					for ($i=0; $i < strlen($_POST["user"]); $i++) { 
						if(!((($_POST["user"][$i] >="0") && ($_POST["user"][$i] <="9" )) || (($_POST["user"][$i] >="a") && ($_POST["user"][$i] <="z" )) || (($_POST["user"][$i] >="A") && ($_POST["user"][$i] <="Z" )))){
							throw new Exception("Solo se admiten  caracteres alfanumericos");
							return false;
						}
					}
				}
			}

			if(!isset($_POST["pass"])){
				throw new Exception("La password no fue ingresada");
				return false;
			}else{
				if ($_POST["pass"] == "") {
					throw new Exception("La password es vacia, ingrese una");
					return false;
				}			
			}

			$sqlExist = "SELECT * FROM usuarios where nombreusuario = '" . $_POST["user"] . "' and password = '" . $_POST["pass"] . "'";
			$usuario = mysqli_query($conn,$sqlExist);
			if (mysqli_num_rows($usuario)){

				$datosUsuario = mysqli_fetch_assoc($usuario);
				$_SESSION["estado"] = true;
				$_SESSION["user"] = $datosUsuario["nombreusuario"];
				$_SESSION["surname"] = $datosUsuario["apellido"];
				$_SESSION["name"] = $datosUsuario["nombre"];
				$_SESSION["userId"] = $datosUsuario["id"];
				$_SESSION["admin"] = $datosUsuario["administrador"];

				return true;
			} else {
				throw new Exception("El usuario o la contase&ntilde;a es inv&aacute;lido");
				return false;
			}
		}

		function esAdmin(){

			if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1){
				return true;
			} else {
				return false;
			}

		}

		function estoyLogueado(){

			if (isset($_SESSION["estado"]) && $_SESSION["estado"] == true){
				return true;
			} else {
				return false;
			}
		}
	}
?>