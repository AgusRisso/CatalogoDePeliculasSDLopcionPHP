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

      $conn = conectar();

      mysqli_set_charset($conn,"UTF8");

      $generos = obtenerGeneros($conn);
      
      include "alertas.php";
      include "formSearch.php";

      $limitePeliculas = 5;

      $page = 1;

      if (isset($_GET["page"])){
        $page = $_GET["page"];
      }

      $peliculasGeneros = obtenerBuscarPeliculasGeneros($conn,$limitePeliculas,$page);

      $cantidadPeliculas = obtenerCantidadDePeliculas($conn);
      $cantidadPaginas = ceil($cantidadPeliculas/$limitePeliculas);

      if ($cantidadPaginas) {
        include "paginacion.php";
      }
      
      include "showFilms.php";

      if ($cantidadPaginas) {
        include "paginacion.php";
      }

      mysqli_free_result($generos);
      mysqli_free_result($peliculasGeneros);

      desconectar($conn);

      include "footer.php"
    ?>    
  </body>
</html>