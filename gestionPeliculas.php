<div class="container-fluid">
<?php
  if (mysqli_num_rows($peliculasGeneros)){
?>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <table class="table text-table">
        <thead>
          <tr>
            <th class="center">T&iacute;tulo</th>
            <th class="center">Sinopsis</th>
            <th class="center">A&ntilde;o</th>
            <th class="center">G&eacute;nero</th>
            <th class="center">Editar</th>
            <th class="center">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php
              while($filaPeliculasGeneros = mysqli_fetch_assoc($peliculasGeneros)){
          ?>
          <tr class="text-table">
            <td class="center"><a class="btn btn-link table-link" href="film.php?idPelicula=<?php echo $filaPeliculasGeneros["peliculaid"]?>" role="button"><?php echo $filaPeliculasGeneros["nombre"]?></a></td>
            <td class="justify"><?php echo $filaPeliculasGeneros["sinopsis"]?></td>
            <td class="center"><?php echo $filaPeliculasGeneros["anio"]?></td>
            <td class="center"><?php echo $filaPeliculasGeneros["genero"]?></td>
            <td class="center"><a class="btn btn-link table-link" href="editFilm.php?idPelicula=<?php echo $filaPeliculasGeneros["peliculaid"]?>" role="button">Editar</a></td>
            <td class="center"><a class="btn btn-link table-link" href="deleteFilm.php?idPelicula=<?php echo $filaPeliculasGeneros["peliculaid"]?>" role="button" onclick="return confirm_delete('deleteFilm.php?idPelicula=<?php echo $filaPeliculasGeneros["peliculaid"]?>')">Eliminar</a></td>
          </tr>
          <?php
              }
          ?>
        </tbody>
      </table>
    </div>
  </div>
<?php
  }
  else{
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 text-form">
      <h4>No se encontraron pel&iacute;culas con las caracter&iacute;sticas indicadas</h4>
    </div>
  </div>    
<?php    
  }
?>
</div>