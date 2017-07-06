<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
    <?php
	    if (isset($_GET["filmEliminado"]) && $_GET["filmEliminado"] === "true"){
	    	echo '<div class="alert alert-success center" role="alert">La pel&iacute;cula ha sido eliminada exitosamente</div>';
	    }
	    else{
	    	echo '<div class="alert alert-success errorCrear center" role="alert">La pel&iacute;cula no ha sido eliminada exitosamente dado que no existe</div>';	
	    }
     ?>
    </div>
  </div>
</div>