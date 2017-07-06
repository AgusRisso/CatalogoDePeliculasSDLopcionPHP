<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form name ="form_comment" id="form_comment" class="form" action="comments.php" method="post" onsubmit="return validar_comentario(document.form_comment.star)">
        <fieldset>
        <legend class="text-form">Comentar Pel&iacute;cula</legend>
          <div class="form-group">
            <textarea rows="8" cols="50" class="form-control form-border" name="comment" id="comment" placeholder="Ingrese el comentario de la pel&iacute;cula..."></textarea>
          </div>
          <div class="form-group">
            <h4 class="text-table enLinea">Califique la pel&iacute;cula:</h4>
            <p class="clasificacion estrella">
              <input id="radio1" type="radio" name="star" value="5">
              <label for="radio1">&#9733;</label>
              <input id="radio2" type="radio" name="star" value="4">
              <label for="radio2">&#9733;</label>
              <input id="radio3" type="radio" name="star" value="3">
              <label for="radio3">&#9733;</label>
              <input id="radio4" type="radio" name="star" value="2">
              <label for="radio4">&#9733;</label>
              <input id="radio5" type="radio" name="star" value="1">
              <label for="radio5">&#9733;</label>
            </p>
            <input type="hidden" name="idPelicula" value=<?php echo$_GET["idPelicula"] ?>>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-danger btn-red">Comentar</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>