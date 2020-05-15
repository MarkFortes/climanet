<?php
  //Checks if the user has logged recently. If so, it will be redirected to home
  session_start();
  if (isset($_SESSION["id_user"])) {
    header("Location:home.php");
  }
?>

<?php
  //Imports the header
  require_once("layouts/headerUnlogged.php");
?>

<div class="container" id="index-container">
  <div class="row">
    <div class="col-md-8 no-padding">
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
              <h1><b>Lleva el control del tiempo a través de una pantalla</b></h1>
              <hr>
              <p>La aplicación perfecta para estar informado minuto a minuto de la climatología de tu entorno.</p>
              <button type="button" class="btn btn-secondary">Leer más </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4" id="login-index-container">
      <div class="row">
        <div class="col-md-12 no-padding">
          <h1>Crear cuenta</h1>
          <form action="controllers/createUserController.php" method="post">
            <div class="form-group">
              <label><b>Nombre de usuario</b></label>
              <input type="text" class="form-control" name="txtUsername" required>
            </div>
            <div class="form-group">
              <label><b>Correo electrónico</b></label>
              <input type="email" class="form-control" name="txtEmail" required>
            </div>
            <div class="form-group">
              <label><b>Contraseña</b></label>
              <input type="password" class="form-control" name="txtPassword" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="btnSignup">Entrar</button>
            </div>
            <div class="form-group">
                <p><a href="#">¿Has olvidado tu contraseña?</a></p>
            </div>
            <div class="form-group">
                <p><a href="#">¿Ya eres miembro de Climanet?</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  require_once("layouts/footer.php");
?>
