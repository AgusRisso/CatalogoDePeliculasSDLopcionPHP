<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
    <?php
    	if (isset($_GET["creado"]) && $_GET["creado"] === "true"){
	    	echo '<div class="alert alert-success center" role="alert">Bienvenido a nac&pop corn time, gracias por registrarse</div>';
	    }
    	
    	if (isset($_GET["filmCreado"]) && $_GET["filmCreado"] === "true"){
	    	echo '<div class="alert alert-success center" role="alert">La pel&iacute;cula ha sido cargada exitosamente</div>';
	    }

	    if (isset($_GET["filmCreado"]) && $_GET["filmCreado"] === "false"){
	    	echo '<div class="alert alert-success errorCrear center" role="alert">La pel&iacute;cula no ha sido cargada exitosamente, ya existe una pel&iacute;cula con el mismo nombre</div>';
	    }

	    if (isset($_GET["filmModificado"]) && $_GET["filmModificado"] === "true"){
	    	echo '<div class="alert alert-success center" role="alert">La pel&iacute;cula ha sido modificada exitosamente</div>';
	    }
	    
	    if (isset($_GET["filmEliminado"]) && $_GET["filmEliminado"] === "true"){
	    	echo '<div class="alert alert-success center" role="alert">La pel&iacute;cula ha sido eliminada exitosamente junto con sus comentarios</div>';
	    }
	    elseif (isset($_GET["filmEliminado"]) && $_GET["filmEliminado"] === "false"){
	    	echo '<div class="alert alert-success errorCrear center" role="alert">La pel&iacute;cula no ha sido eliminada exitosamente dado que no existe</div>';	
	    }

	    if (isset($_GET["logueado"]) && $_GET["logueado"] === "true" && $_SESSION["estado"] == true){
	    	echo '<div class="alert alert-success center" role="alert">Bienvenido a nac&pop corn time, ' . $_SESSION["user"] . '</div>';
	    }

	    if (isset($_GET["logOut"]) && $_GET["logOut"] === "true"){
	    	echo '<div class="alert alert-success center" role="alert">La sesi&oacute;n se cerr&oacute; correctamente</div>';
	    }

	    if (isset($_GET["comentario"]) && $_GET["comentario"] === "true"){
	    	echo '<div class="alert alert-success center" role="alert">La Pel&iacute;cula ha sido comentada con &eacute;xito</div>';
	    }

	    if (isset($_GET["datosErroneos"]) && $_GET["datosErroneos"] === "false"){
	    	echo '<div class="alert alert-success errorCrear center" role="alert">Por favor, verifique que los datos del usuario cumplan el formato</div>';
	    }

	    if (isset($_GET["datosErroneosFilm"]) && $_GET["datosErroneosFilm"] === "true"){
	    	echo '<div class="alert alert-success errorCrear center" role="alert">Por favor, verifique que los datos de la pel&iacute;cula cumplan el formato</div>';
	    }

	    if (isset($_GET["urlMal"]) && $_GET["urlMal"] === "true"){
	    	echo '<div class="alert alert-success errorCrear center" role="alert">Por favor, trate de no manipular indebidamente la url</div>';
	    }
     ?>
    </div>
  </div>
</div>