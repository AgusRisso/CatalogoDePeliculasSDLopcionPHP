<div class="container-fluid">
  <?php
    if (mysqli_num_rows($comentarios)){
     while ($filaComentarios = mysqli_fetch_assoc($comentarios)){
  ?>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default panel-border-comentario panel-color">
        <div class="panel-body">
          <h4>Nombre y Apellido: <?php echo $filaComentarios["nombre"] . " " . $filaComentarios["apellido"]?></h4>
          <h4>Fecha: <?php echo $filaComentarios["fecha"]?></h4>
          <h4>Comentario: <?php echo $filaComentarios["comentario"]?></h4>
          <h4>Calificaci&oacute;n:
          <?php
            echo '<div class="estrella">';
            for ($i=0; $i < ceil($filaComentarios["calificacion"]) ; $i++) { 
              echo '&#9733';
            }
            echo '</div>';
          ?>
          </h4>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
  }
  else{
  ?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-form">
      <h4>La pel&iacute;cula todav&iacute;a no tiene comentarios ni calificaciones</h4>
    </div>
  </div>    
  <?php
  }
  ?>
</div>