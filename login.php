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

<div class="container" id="login-container">
  <div class="row">
        <div class="col-md-12 no-padding">
          <h1>Iniciar sesión</h1>
          <form action="controllers/validateUserController.php" method="post">
            <div class="form-group">
              <label><b>Correo electrónico</b></label>
              <input type="email" class="form-control" name="txtEmail" required>
            </div>
            <div class="form-group">
              <label><b>Contraseña</b><a href="#"> ¿Has olvidado tu contraseña?</a></label>
              <input type="password" class="form-control" name="txtPassword" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="btnLogin">Entrar</button>
            </div>
            <div class="form-group">
                <p>¿Aún no eres miembro de Climanet? <a href="signup.php">¡Pulsa aquí!</a></p>
            </div>
          </form>
        </div>
  </div>
</div>

<?php
  require_once("layouts/footer.php");
?>
