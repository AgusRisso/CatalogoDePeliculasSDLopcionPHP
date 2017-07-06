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
      include "funciones.php";

      if ($clase->estoylogueado() && $clase->esAdmin()){

        if (isset($_GET['idPelicula'])){

          $conn = conectar();
          mysqli_set_charset($conn,"UTF8");
          $peliculasGeneros = obtenerUnaPeliculasGeneros($conn);
        
          include "alertas.php";        
          include "formEditFilm.php";

          mysqli_free_result($peliculasGeneros);

          desconectar($conn);
        }
        else{
          header("Location: backend.php?urlMal=true");        
        }

        include "footer.php";
    ?>
  </body>
</html>
<?php
}
else{
  header("Location: index.php");
}
?>