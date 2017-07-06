<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 center">
      <div class="pagination">
        <?php
          $parametros = "";

          if(isset($_GET["titulo"])){
              $parametros .= "&titulo=" . $_GET["titulo"];
          }

          if(isset($_GET["genero"])){
              $parametros .= "&genero=" . $_GET["genero"];
          }

          if(isset($_GET["anio"])){
              $parametros .= "&anio=" . $_GET["anio"];
          }

          if(isset($_GET["orden"])){
              $parametros .= "&orden=" . $_GET["orden"];
          }

          $anterior = $page;
          if ($anterior>1){
            $anterior--;
          }

          echo '<a href="index.php?page=' . $anterior . $parametros . '">' . "&laquo" . '</a>';

          for ($i=1; $i <= $cantidadPaginas ; $i++) {

            if ($page == $i) {
              echo '<a class="active" href="index.php?page=' . $i . $parametros . '">' . $i . '</a>';
            }
            else{
              echo '<a href="index.php?page=' . $i . $parametros . '">' . $i . '</a>';
            }
          }

          $siguiente = $page;
          if ($siguiente<$cantidadPaginas){
            $siguiente++;
          }
          echo '<a href="index.php?page=' . $siguiente . $parametros . '">' . "&raquo" . '</a>';
        ?>
      </div>
    </div>
  </div>
</div>