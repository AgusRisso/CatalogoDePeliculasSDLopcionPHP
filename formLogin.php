<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form id="logIn" class="form" action="validar.php" method="post" onsubmit="return validar_login()">
        <fieldset>
        <legend class="text-form">Iniciar Sesi&oacute;n</legend>
        <?php
        if (isset($_GET["logueado"]) && $_GET["logueado"] === "false"){
        echo '<div class="alert alert-danger errorCrear center" role="alert">' . $_SESSION["msg"] . '</div>';
        }
        ?>
        <div class="form-group">
          <input type="text" class="form-control form-border" name="user" id="user" placeholder="Ingrese su Usuario...">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-border" name="pass" id="pass" placeholder="Ingrese su Contrase&ntilde;a...">
        </div>
          <button type="submit" class="btn btn-danger btn-red">Iniciar Sesi&oacute;n</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>