<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form class="form" action="backend.php" onsubmit="return validar()" method="get">
      <!-- <form class="form" action="index.php" method="get" name="formulario"> -->
        <fieldset>
          <legend class="text-form">Buscar Pel&iacute;cula</legend>
          <div class="form-group">
            <?php
              if (isset($_GET["titulo"])){
            ?>    
                <input type="search" class="form-control form-border" value="<?php echo $_GET["titulo"] ?>" name="titulo" id="titulo" placeholder="Ingrese T&iacute;tulo de La Pel&iacute;cula...">
            <?php  
              }
              else{
            ?>
                <input type="search" class="form-control form-border" name="titulo" id="titulo" placeholder="Ingrese T&iacute;tulo de La Pel&iacute;cula...">
            <?php
              }
            ?>
          </div>
          <div class="form-group">
            <select class="form-control form-border" name="genero" id="genero">
              <option value="0">Seleccione G&eacute;nero</option>
                <?php
                  if (mysqli_num_rows($generos)){
                    
                    while($filaGeneros = mysqli_fetch_assoc($generos)){
                      if (isset($_GET["genero"]) and $_GET["genero"] == $filaGeneros["id"]){
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
          <div class="form-group">
            <?php
              if (isset($_GET["anio"])){
            ?>
                <input type="number" class="form-control form-border" value="<?php echo $_GET["anio"] ?>" name="anio" id="anio" placeholder="Ingrese A&ntilde;o de La Pel&iacute;cula...">
            <?php
              }
              else{
            ?>
                <input type="number" class="form-control form-border" name="anio" id="anio" placeholder="Ingrese A&ntilde;o de La Pel&iacute;cula...">
            <?php
              }
            ?>
          </div>
          <div class="form-group">
            <select class="form-control form-border" name="orden" id="orden">
              <?php
                if (isset($_GET["orden"])){
                  switch ($_GET["orden"]){
                    case "1":
              ?>
                      <option selected value="1">Ordenar por Orden Alfab&eacute;tico Ascendentemente</option>
                      <option value="2">Ordenar por Orden Alfab&eacute;tico Descendentemente</option>
                      <option value="3">Ordenar por a&ntilde;o Ascendentemente</option>
                      <option value="4">Ordenar por a&ntilde;o Descendentemente</option>
              <?php
                      break;

                    case "2":
              ?>
                      <option value="1">Ordenar por Orden Alfab&eacute;tico Ascendentemente</option>
                      <option selected value="2">Ordenar por Orden Alfab&eacute;tico Descendentemente</option>
                      <option value="3">Ordenar por a&ntilde;o Ascendentemente</option>
                      <option value="4">Ordenar por a&ntilde;o Descendentemente</option>
              <?php
                      break;

                    case "3":
              ?>
                      <option value="1">Ordenar por Orden Alfab&eacute;tico Ascendentemente</option>
                      <option value="2">Ordenar por Orden Alfab&eacute;tico Descendentemente</option>
                      <option selected value="3">Ordenar por a&ntilde;o Ascendentemente</option>
                      <option value="4">Ordenar por a&ntilde;o Descendentemente</option>
              <?php
                      break;
                    
                    case "4":
              ?>
                      <option value="1">Ordenar por Orden Alfab&eacute;tico Ascendentemente</option>
                      <option value="2">Ordenar por Orden Alfab&eacute;tico Descendentemente</option>
                      <option value="3">Ordenar por a&ntilde;o Ascendentemente</option>
                      <option selected value="4">Ordenar por a&ntilde;o Descendentemente</option>
              <?php
                      break;
                  }
                }
                else{
              ?>
                  <option value="1">Ordenar por Orden Alfab&eacute;tico Ascendentemente</option>
                  <option value="2">Ordenar por Orden Alfab&eacute;tico Descendentemente</option>
                  <option value="3">Ordenar por a&ntilde;o Ascendentemente</option>
                  <option selected value="4">Ordenar por a&ntilde;o Descendentemente</option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-danger btn-red">Buscar</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>