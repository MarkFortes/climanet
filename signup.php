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

<div class="container" id="signup-container">
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
              <label><b>Contraseña</b> <div style="font-size:11px">(mínimo: 8 carácteres, 1 mayúscula, 1 minúscula, 1 número)</div></label>
              <input type="password" class="form-control" name="txtPassword" id="txtPassword" oninput="ValidatePasswordFormat()" required>
            </div>
            <div class="form-group">
              <button disabled type="submit" class="btn btn-primary" name="btnSignup" id="btnSignup">Registrar</button>
            </div>
            <div class="form-group">
                <p>¿Ya eres miembro de Climanet? <a href="login.php">¡Pulsa aquí!</a></p>
            </div>
          </form>
        </div>
  </div>
</div>

<!--Call to my own js functions-->
<script src="js/clsSignup.js"></script>

<?php
  require_once("layouts/footer.php");
?>
