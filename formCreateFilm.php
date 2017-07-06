<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form id="createFilm" class="form" action="insertFilm.php" method="post" onsubmit="return validar_crear_pelicula()" enctype="multipart/form-data">
        <fieldset>
        <legend class="text-form">Cargar Pel&iacute;cula</legend>
        <div class="form-group">
          <input type="text" class="form-control form-border" name="nameFilm" id="nameFilm" placeholder="Ingrese el Nombre de la pel&iacute;cula...">
        </div>
        <div class="form-group">
          <textarea rows="8" cols="50" class="form-control form-border" name="sinopsis" id="sinopsis" placeholder="Ingrese la sinopsis de la pel&iacute;cula..."></textarea>
        </div>
        <div class="form-group">
          <input type="number" class="form-control form-border" name="anio" id="anio" placeholder="Ingrese el a&ntilde;o de estreno de la pel&iacute;cula...">
        </div>
        <div class="form-group">
            <select class="form-control form-border" name="genero" id="genero">
              <option value="0">Seleccione G&eacute;nero de la pel&iacute;cula</option>
                <?php
                  if (mysqli_num_rows($generos)){
                    
                    while($filaGeneros = mysqli_fetch_assoc($generos)){
                ?>
                      <option value="<?php echo $filaGeneros["id"]?>"><?php echo $filaGeneros["genero"]?></option>
                <?php
                    }
                  }
                ?>
            </select>
          </div>
        <div class="form-group text-form">
          <input type="file" name="imagen" id="imagen" value="Enviar Imagen" placeholder="Ingrese el poster de la pel&iacute;cula...">
        </div>
          <button type="submit" class="btn btn-danger btn-red">Cargar Pel&iacute;cula</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>