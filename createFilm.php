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
        include "formCreateFilm.php";
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