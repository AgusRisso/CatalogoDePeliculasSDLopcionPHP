<?php
	$filaPeliculasGeneros = mysqli_fetch_assoc($peliculasGeneros)
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<form id="modifiyFilm" class="form" action="updateFilm.php" method="post" onsubmit="return validar_modificar_pelicula()" enctype="multipart/form-data">
    		<fieldset>
        	<legend class="text-form">Modificar Pel&iacute;cula</legend>
	        <h4 class="text-form">T&iacute;tulo:</h4>		
        	 <div class="form-group">
	         	<input type="text" class="form-control form-border" name="nameFilm" id="nameFilm" value="<?php echo $filaPeliculasGeneros["nombre"]?>">
	        </div> 
	        <h4 class="text-form">Sinopsis:</h4>		
	        <div class="form-group">
	          <textarea rows="8" cols="50" class="form-control form-border" name="sinopsis" id="sinopsis"><?php echo $filaPeliculasGeneros["sinopsis"]?></textarea>
	        </div>	
	        <h4 class="text-form">A&ntilde;o de Estreno:</h4>
	       	<div class="form-group">
	          <input type="number" class="form-control form-border" name="anio" id="anio" value=<?php echo $filaPeliculasGeneros["anio"]?>>
	        </div>	        		
	        <h4 class=" text-form">G&eacute;nero:</h4>
	        <div class="form-group">
	            <select class="form-control form-border" name="genero" id="genero">
	                <?php
	                	$generos = obtenergeneros($conn);

		                if (mysqli_num_rows($generos)){
		                    
		                    while($filaGeneros = mysqli_fetch_assoc($generos)){
		                      if ($filaPeliculasGeneros["generoid"] == $filaGeneros["id"]){
		                ?>
		                        <option selected value="<?php echo $filaGeneros["id"]?>"><?php echo $filaGeneros["genero"]?></option>
		                      <?php
		                      }
		                      else{
		                      ?>
		                        <option value="<?php echo $filaGeneros["id"]?>"><?php echo $filaGeneros["genero"]?></option>
		                      <?php
		                      }
		                }
	                  }
	                ?>
	            </select>
	        </div>	        		
	        <h4 class="text-form">Poster:</h4>
	        <div class="form-group center">	            	 
            <?php echo '<img class="poster" src="data:' . $filaPeliculasGeneros['tipoimagen'] . ';base64,' . base64_encode( $filaPeliculasGeneros['contenidoimagen'] ) . '"/>';?>
            </div>
	        <div class="form-group text-form">
	          <input type="file" name="imagen" id="imagen" value="Enviar Imagen">
	        </div>
	        <input type="hidden" name="idPelicula" value=<?php echo$_GET["idPelicula"] ?>>
	        <div class="form-group">
          		<button type="submit" class="btn btn-danger btn-red">Modificar</button>
          	</div>
        </fieldset>
    	</form>
    </div>
  </div>
</div>