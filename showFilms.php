<div class="container-fluid">
  <?php
    if (mysqli_num_rows($peliculasGeneros)){
      while($filaPeliculasGeneros = mysqli_fetch_assoc($peliculasGeneros)){
        
        $promedio = obtenerPromedioCalificaciones($conn, $filaPeliculasGeneros["peliculaid"]);
  ?>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default panel-border-film panel-color">
        <div class="panel-body">
          <div class="media">
            <div class="media-left">
              <a href="film.php?idPelicula=<?php echo $filaPeliculasGeneros["peliculaid"]?>"> 
                <?php echo '<img class="poster" src="data:' . $filaPeliculasGeneros['tipoimagen'] . ';base64,' . base64_encode( $filaPeliculasGeneros['contenidoimagen'] ) . '"/>';?>
              </a>
            </div>
            <div class="media-body">
            <a class="name-link" href="film.php?idPelicula=<?php echo $filaPeliculasGeneros["peliculaid"]?>"> 
              <h4>T&iacute;tulo: <?php echo $filaPeliculasGeneros["nombre"]?></h4>
            </a>
              <h4>Sinopsis: <?php echo $filaPeliculasGeneros["sinopsis"]?></h4>
              <h4>A&ntilde;o de Estreno: <?php echo $filaPeliculasGeneros["anio"]?></h4>
              <h4>G&eacute;nero: <?php echo $filaPeliculasGeneros["genero"]?></h4>
              <h4>Puntaje:
              <?php if($promedio ==0){ echo "La pelicula no ha sido calificada";}
               else {
                      echo '<div class="estrella">';
                       for ($i=0; $i < ceil($promedio) ; $i++) { 
                         echo '&#9733';
                       }
                      echo '</div>';
                    } 
              ?>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
      }
    }
    else{
  ?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-form">
      <h4>No se encontraron pel&iacute;culas con las caracter&iacute;sticas indicadas</h4>
    </div>
  </div>    
  <?php    
    }
  ?>
</div>