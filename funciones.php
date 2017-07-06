<?php 

function conectar(){
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "seminario_lenguaje_php";
	//return mysqli_connect($servername, $username, $password, $dbname) or die('<h1 class="text-form">Error En la conexion</h1>');
	return mysqli_connect($servername, $username, $password, $dbname);
}

function desconectar($conn){
	mysqli_close($conn);
}

function obtenerGeneros($conn){
	$consultaGeneros = "SELECT id, genero FROM generos";
	return mysqli_query($conn, $consultaGeneros);
}

function obtenerBuscarPeliculasGeneros($conn, $limite ,$page){
	$consultaPeliculasGeneros ="SELECT p.id as peliculaid, p.nombre, p.sinopsis, p.anio, p.generos_id, p.contenidoimagen, p.tipoimagen, g.id as generoid, g.genero FROM peliculas AS p INNER JOIN generos AS g ON p.generos_id = g.id where '1=1'";

	if(isset($_GET["titulo"]) and $_GET["titulo"] !== ""){
	    $consultaPeliculasGeneros .= " AND p.nombre LIKE '%" . $_GET["titulo"] . "%'";
	}

	if(isset($_GET["genero"]) and $_GET["genero"]!== "0" ){
	    $consultaPeliculasGeneros .= " AND p.generos_id = " . $_GET["genero"];
	}

	if(isset($_GET["anio"]) and $_GET["anio"] !==""){
	    $consultaPeliculasGeneros .= " AND p.anio =" . $_GET["anio"];
	}

	if(isset($_GET["orden"])){

	    switch ($_GET["orden"]) {
	    	case "1":
	    		$consultaPeliculasGeneros .= " ORDER BY p.nombre ASC";
	    		break;

	    	case "2":
	    		$consultaPeliculasGeneros .= " ORDER BY p.nombre DESC";
	    		break;
	    	case "3":
	    		$consultaPeliculasGeneros .= " ORDER BY p.anio ASC";
	    		break;
	    	case "4":
	    		$consultaPeliculasGeneros .= " ORDER BY p.anio DESC";
	    		break;
	    }
	}
	else{
		$consultaPeliculasGeneros .= " ORDER BY p.anio DESC";
	}

	
	$consultaPeliculasGeneros .= " LIMIT " . $limite . " OFFSET " . ($page - 1)*$limite ;

	return mysqli_query($conn, $consultaPeliculasGeneros);
}

function obtenerComentariosPeliculas($conn){
	$consultaComentarios = "SELECT c.id as comentarioid, c.comentario, c.fecha, c.peliculas_id, c.usuarios_id, c.calificacion, u.nombreusuario,u.nombre, u.apellido FROM comentarios AS c INNER JOIN usuarios AS u ON c.usuarios_id = u.id where c.peliculas_id=" . $_GET["idPelicula"] . " ORDER BY c.fecha DESC";

	return mysqli_query($conn, $consultaComentarios);
}

function obtenerUnaPeliculasGeneros($conn){
	$consultaPeliculasGeneros = "SELECT p.id as peliculaid, p.nombre, p.sinopsis, p.anio, p.generos_id, p.contenidoimagen, p.tipoimagen, g.id as generoid, g.genero FROM peliculas AS p INNER JOIN generos AS g ON p.generos_id = g.id where p.id =" . $_GET["idPelicula"];

	return mysqli_query($conn, $consultaPeliculasGeneros);
}

function obtenerPromedioCalificaciones($conn, $peliculaid){
	$consultaPromedio = "SELECT AVG(calificacion) as prom FROM comentarios where peliculas_id =" . $peliculaid;	
	$promedio = mysqli_query($conn, $consultaPromedio);
	$promedio = mysqli_fetch_assoc($promedio);
	$promedio = $promedio["prom"];
	
	if ($promedio === NULL) {
        $promedio = 0;
    }
	
	return $promedio;
}

function obtenerCantidadDePeliculas($conn){
	$consultaPeliculasGeneros ="SELECT p.id as peliculaid, p.nombre, p.sinopsis, p.anio, p.generos_id, p.contenidoimagen, p.tipoimagen, g.id as generoid, g.genero FROM peliculas AS p INNER JOIN generos AS g ON p.generos_id = g.id where '1=1'";

	if(isset($_GET["titulo"]) and $_GET["titulo"] !== ""){
	    $consultaPeliculasGeneros .= " AND p.nombre LIKE '%" . $_GET["titulo"] . "%'";
	}

	if(isset($_GET["genero"]) and $_GET["genero"]!== "0" ){
	    $consultaPeliculasGeneros .= " AND p.generos_id = " . $_GET["genero"];
	}

	if(isset($_GET["anio"]) and $_GET["anio"] !==""){
	    $consultaPeliculasGeneros .= " AND p.anio =" . $_GET["anio"];
	}

	return mysqli_num_rows (mysqli_query($conn, $consultaPeliculasGeneros));
}

function validarUsuario(){

	if(!isset($_POST["user"])){
		return false;
	}else{
		if ($_POST["user"] == "") {
			return false;
		}
		else{
			if(strlen($_POST["user"]) < 6){
				return false;
			}
			for ($i=0; $i < strlen($_POST["user"]); $i++) { 
				if(!((($_POST["user"][$i] >="0") && ($_POST["user"][$i] <="9" )) || (($_POST["user"][$i] >="a") && ($_POST["user"][$i] <="z" )) || (($_POST["user"][$i] >="A") && ($_POST["user"][$i] <="Z" )))){
					return false;
				}
			}
		}
	}

	if(!(isset($_POST["email"]) && $_POST["email"] !== "")){
		return false;
	}

	if(!isset($_POST["name"])){
		return false;
	}else{
		if ($_POST["name"] == "") {
			return false;
		}
		else{
			for ($i=0; $i < strlen($_POST["name"]); $i++) { 
				if(!((($_POST["name"][$i] >="a") && ($_POST["name"][$i] <="z" )) || (($_POST["name"][$i] >="A") && ($_POST["name"][$i] <="Z" )))){
					return false;
				}
			}
		}
	}

	if(!isset($_POST["surName"])){
		return false;
	}else{
		if ($_POST["surName"] == "") {
			return false;
		}
		else{
			for ($i=0; $i < strlen($_POST["surName"]); $i++) { 
				if(!((($_POST["surName"][$i] >="a") && ($_POST["surName"][$i] <="z" )) || (($_POST["surName"][$i] >="A") && ($_POST["surName"][$i] <="Z" )))){
					return false;
				}
			}
		}
	}

	if(!isset($_POST["pass"])){
		return false;
	}else{
		if ($_POST["pass"] == "") {
			return false;
		}
		else{
			if (strlen($_POST["pass"]) < 6) {
				return false;
			}
			else{
				
				$letra=0;
				$num=0;
				$especial=0;

				for ($i=0; $i < strlen($_POST["pass"]); $i++) { 
					if(((($_POST["pass"][$i] >="a") && ($_POST["pass"][$i] <="z" )) || (($_POST["pass"][$i] >="A") && ($_POST["pass"][$i] <="Z" )))){
						$letra++;
					}
					else{
						if(($_POST["pass"][$i] >="0") && ($_POST["pass"][$i] <="9" )){
							$num++;
						}
						else{
							$especial++;
						}
					}
				}
				if(($letra<3) || ($num<2) || ($especial<1)) {
					return false;
				}
			}
		}
	}

	if (!isset($_POST["passRepeat"])){
		return false;
	}
	else{
		if($_POST["pass"] != $_POST["passRepeat"]){
			return false;
		}
	}

	return true;
}

function insertarUsuario($conn){

	$creado = false;

	$sqlExist = "SELECT * FROM usuarios where nombreusuario = '" . $_POST["user"] . "' OR email = '" . $_POST["email"] . "'";
	$cantidad = mysqli_num_rows(mysqli_query($conn, $sqlExist));

	if (!$cantidad){

		$sqlInsert = "INSERT INTO usuarios (nombreusuario, email, password, nombre, apellido, administrador) VALUES (";
		$sqlInsert .= " '" . $_POST["user"] . "'";
		$sqlInsert .= ",'" . $_POST["email"] . "'";
		$sqlInsert .= ",'" . $_POST["pass"] . "'";
		$sqlInsert .= ",'" . $_POST["name"]. "'";
		$sqlInsert .= ",'" . $_POST["surName"]. "'";
		$sqlInsert .= ",0 )";

		mysqli_query($conn,$sqlInsert);

		$creado = true;
	}

	return $creado;
}

function validarInsertarPelicula(){

	if(!isset($_POST['nameFilm'])){
		return false;
	}
	else{
		if($_POST['nameFilm'] == ""){
			return false;
		}
	}

	if(!isset($_POST['sinopsis'])){
		return false;
	}
	else{
		if($_POST['sinopsis'] == ""){
			return false;
		}
	}
	
	if(!isset($_POST['anio'])){
		return false;
	}
	else{
		if(strlen($_POST['anio']) != 4 || $_POST['anio'] < 1900){
			return false;
		}
	}

	if(!isset($_POST['genero'])){
		return false;
	}
	else{
		if($_POST['genero'] == 0){
			return false;
		}
	}

	if(!isset($_FILES["imagen"])){
		return false;
	}
	else{
		if($_FILES['imagen']['size'] == 0){
			return false;
		}
	}

	return true;
}

function insertarPelicula($conn){

	$creado = false;

	// $sqlExist = "SELECT * FROM peliculas where nombre = '" . $_POST["nameFilm"] . "'";
	// $cantidad = mysqli_num_rows(mysqli_query($conn, $sqlExist));

	// if (!$cantidad){		

		$sqlInsert = "INSERT INTO peliculas (nombre, sinopsis, anio, generos_id, contenidoimagen, tipoimagen) VALUES (";
		$sqlInsert .= " '" . $_POST["nameFilm"] . "'";
		$sqlInsert .= ",'" . $_POST["sinopsis"] . "'";
		$sqlInsert .= ",'" . $_POST["anio"] . "'";
		$sqlInsert .= ",'" . $_POST["genero"]. "'";

		//carga de imagen
		$nombre_imagen=$_FILES['imagen']['name'];
		$tipo_imagen=$_FILES['imagen']['type'];
		$tamanio_imagen=$_FILES['imagen']['size'];

		$imagen_bytes=fopen($_FILES['imagen']['tmp_name'], "r");

		$contenido_bytes=fread($imagen_bytes,$tamanio_imagen);

		$contenido_bytes=addslashes($contenido_bytes);

		fclose($imagen_bytes);

		$sqlInsert .= ",'" . $contenido_bytes. "'";
		$sqlInsert .= ",'" . $tipo_imagen. "')";

		mysqli_query($conn,$sqlInsert);

		$creado = true;
	//}	
	return $creado;
}

function eliminarPelicula($conn){

	$eliminado = false;
	
	$sqlExist = "SELECT * FROM peliculas where id = '" . $_GET["idPelicula"] . "'";
	$cantidad = mysqli_num_rows(mysqli_query($conn, $sqlExist));
	
	if ($cantidad){

		$sqlDelete = "DELETE FROM comentarios where peliculas_id = " . $_GET["idPelicula"];
		$sqlDelete2 = "DELETE FROM peliculas where id = " . $_GET["idPelicula"];

		mysqli_query($conn,$sqlDelete);
		mysqli_query($conn,$sqlDelete2);

		$eliminado = true;
	}
	
	return $eliminado;
}

function crearComentario($conn){

	$creado = false;

	$date = date("Y-m-d");

	$sqlInsert = "INSERT INTO comentarios (comentario, fecha,peliculas_id, usuarios_id, calificacion) VALUES (";
	$sqlInsert .= "'" . $_POST["comment"] . "'";
	$sqlInsert .= ",'" . $date . "'";
	$sqlInsert .= ",'" . $_POST["idPelicula"] . "'";
	$sqlInsert .= ",'" . $_SESSION["userId"]. "'";
	$sqlInsert .= ",'" . $_POST["star"]. "')";

	if(mysqli_query($conn,$sqlInsert)){
		$creado = true;
	}
	
	return $creado;
}

function puedoComentar($conn){
	
	$puedo = false;
	$sqlExist = "SELECT * FROM comentarios where peliculas_id =" . $_GET["idPelicula"] . " and usuarios_id =" . $_SESSION["userId"];
	$cantidad = mysqli_num_rows(mysqli_query($conn, $sqlExist));
	if (!$cantidad){
		$puedo = true;
	}
	
	return $puedo;	
}

function validarModificarPelicula(){

	if(!isset($_POST['nameFilm'])){
		return false;
	}
	else{
		if($_POST['nameFilm'] == ""){
			return false;
		}
	}

	if(!isset($_POST['sinopsis'])){
		return false;
	}
	else{
		if($_POST['sinopsis'] == ""){
			return false;
		}
	}
	
	if(!isset($_POST['anio'])){
		return false;
	}
	else{
		if(strlen($_POST['anio']) != 4 || $_POST['anio'] < 1900){
			return false;
		}
	}

	if(!isset($_POST['genero'])){
		return false;
	}
	else{
		if($_POST['genero'] == 0){
			return false;
		}
	}

	return true;
}

function modificarFilm($conn){

	$modificado=false;

	$sqlFilmExist= "SELECT * FROM peliculas where id=" . $_POST["idPelicula"];

	$cantidad=mysqli_num_rows(mysqli_query($conn,$sqlFilmExist));

	if($cantidad){
		
			$sqlModify = "UPDATE peliculas SET ";

			if (isset($_POST["nameFilm"]) && ($_POST["nameFilm"] !=="")){
				$sqlModify .= "nombre='" . $_POST["nameFilm"] . "' ";
			}

			if (isset($_POST["sinopsis"]) && ($_POST["sinopsis"] !=="")){
				$sqlModify .= ", sinopsis='" . $_POST["sinopsis"] ."' ";
			}

			if (isset($_POST["genero"]) && ($_POST["genero"] !=="0")){
				$sqlModify .= ", generos_id=" . $_POST["genero"] . " ";
			}

			if (isset($_POST["anio"]) && ($_POST["anio"] !=="")){
				$sqlModify .= ", anio='" . $_POST["anio"] ."' ";
			}

			if(($_FILES['imagen']['size']!==0)){
				//carga de imagen
				$nombre_imagen=$_FILES['imagen']['name'];
				$tipo_imagen=$_FILES['imagen']['type'];
				$tamanio_imagen=$_FILES['imagen']['size'];

				$imagen_bytes=fopen($_FILES['imagen']['tmp_name'], "r");

				$contenido_bytes=fread($imagen_bytes,$tamanio_imagen);

				$contenido_bytes=addslashes($contenido_bytes);

				fclose($imagen_bytes);

				$sqlModify .= ", contenidoimagen='" . $contenido_bytes ."', tipoimagen ='" . $tipo_imagen ."'";
			}


			$sqlModify .= "WHERE  id=" . $_POST["idPelicula"];

			mysqli_query($conn,$sqlModify);

			$modificado = true;
	}

	return $modificado;
}

?>