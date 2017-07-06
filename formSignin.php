<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form id="signIn" class="form" action="insert.php" onsubmit="return validar_signin()" method="post">
        <fieldset>
        <legend class="text-form">Registrarse</legend>
        <?php
        if (isset($_GET["creado"]) && $_GET["creado"] === "false"){
        echo '<div class="alert alert-danger errorCrear center" role="alert">El usuario o el Email ya existe, por favor ingrese otro</div>';
        }
        ?>
        <div class="form-group">
          <input type="text" class="form-control form-border" name="name" id="name" placeholder="Ingrese su Nombre...">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-border" name="surName" id="surName" placeholder="Ingrese su Apellido...">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-border" name="email" id="email" placeholder="Ingrese el email...">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-border" name="user" id="user" placeholder="Ingrese el Nombre de Usuario Deseado...">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-border" name="pass" id="pass" placeholder="Ingrese la Contrase&ntilde;a Deseada...">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-border" name="passRepeat" id="passRepeat" placeholder="Ingrese Nuevamente la Contrase&ntilde;a Deseada...">
        </div>
          <button type="submit" class="btn btn-danger btn-red">Registrarse</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>