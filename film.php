<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
   
    <?php
      include "import.php";
    ?>

  </head>
  
  <body>
 
    <?php
      include "header.php";
      include "alertas.php";      
      include "funciones.php";

      if (isset($_GET['idPelicula'])){

        $conn = conectar();
        mysqli_set_charset($conn,"UTF8");
        $peliculasGeneros = obtenerUnaPeliculasGeneros($conn);
    
        $comentarios = obtenerComentariosPeliculas($conn);
      
        include "showFilms.php";
        
        if ($clase->estoylogueado()){
          
          if (puedoComentar($conn)) {
            include "formComment.php";
          }
          else{
            echo '<div class="container-fluid">';
            echo '<div class="row">';
            echo '<div class="col-md-4 col-md-offset-4">';
            echo '<h4 class="text-form">Usted ya ha comentado y calificado la pelicula</h5>';
            echo '</div>';
            echo '</div">';
            echo '</div>';
          }
        }

        include "showComments.php";

        mysqli_free_result($peliculasGeneros);
        mysqli_free_result($comentarios);

        desconectar($conn);
      }
      else{
        header("Location: index.php?urlMal=true");
      }

      include "footer.php"
    ?>    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>