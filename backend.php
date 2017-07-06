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

          $conn = conectar();

          mysqli_set_charset($conn,"UTF8");

          $generos = obtenerGeneros($conn);
          
          include "alertas.php";
          include "formSearchGestionPeliculas.php";

          $limitePeliculas = 5;

          $page = 1;

          if (isset($_GET["page"])){
            $page = $_GET["page"];
          }

          $peliculasGeneros = obtenerBuscarPeliculasGeneros($conn,$limitePeliculas,$page);

          $cantidadPeliculas = obtenerCantidadDePeliculas($conn);
          $cantidadPaginas = ceil($cantidadPeliculas/$limitePeliculas);

          if ($cantidadPaginas) {
            include "paginacionGestionPeliculas.php";
          }
          
          include "gestionPeliculas.php";

          if ($cantidadPaginas) {
            include "paginacionGestionPeliculas.php";
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