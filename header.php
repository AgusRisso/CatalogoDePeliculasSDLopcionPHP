<div class="container-fluid background-Header">
  <div class="row">
    <div class="col-md-1">
        <a class="btn btn-danger btn-red" href="index.php">Inicio</a>
    </div>
    <?php
    include "autenticar.php";

    $clase = new autenticar;

    if ($clase->estoylogueado()){
        if ($clase->esAdmin()){
    ?>
    <div class="col-md-1 col-md-offset-9">
        <a class="pull-left" href="backend.php"> 
            <img title="Editar Peliculas"  alt="Editar peliculas" src="Imagenes/adminFilms.png" height="35" width="35">
        </a> 
        <a class="pull-left" href="createFilm.php"> 
            <img title="Subir Peliculas" alt="Subir peliculas" src="Imagenes/up.ico" height="35" width="35">
        </a>
    </div>
    <div class="col-md-1">
        <a class="btn btn-danger btn-red pull-right" href="logOut.php">Cerrar Sesion</a>
    </div>
    <?php
        }
        else{
    ?>
    <div class="col-md-1 col-md-offset-10">
        <a class="btn btn-danger btn-red pull-right" href="logOut.php">Cerrar Sesion</a>
    </div>
    <?php
        }
    }
    else{
    ?>
    <div class="col-md-1 col-md-offset-9">
        <a class="btn btn-danger btn-red" href="logIn.php">Iniciar Sesion</a>
    </div>
    <div class="col-md-1">
        <a class="btn btn-danger btn-red" href="signIn.php">Registrarse</a>
    </div>
    <?php
    }
    ?>
  </div>
  <?php
    if ($clase->estoylogueado()){
  ?>
   <div class="row">
    <div class="col-md-2 col-md-offset-10">
        <h4 class="pull-right text-table"><?php echo $_SESSION["name"] . " " . $_SESSION["surname"]?></h5>
    </div>
   </div>
    <?php
        }
    ?>
</div>