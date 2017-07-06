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
      if (!$clase->estoylogueado()){
      
        include "formSignin.php";
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