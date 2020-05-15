<?php
  //Checks if the user has logged recently. If not, it will be redirected to index
  session_start();
  if (!isset($_SESSION["id_user"])) {
    header("Location:index.php");
  }else {
    //Imports Classes
    require_once("models/Connection.php");
    require_once("models/UsersManagament.php");

    $conn = new Connection();
    $id_user = $_SESSION["id_user"];

    //Imports header
    require_once("layouts/headerLogged.php");
  }
?>

<div class="container" id="home-container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <h3>¡Bienvenido a Climanet, <b><?php echo UsersManagament::getUsername($conn, $id_user); ?></b>!</h3>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Fecha y hora</th>
                <th scope="col">Temperatura</th>
                <th scope="col">Humedad</th>
              </tr>
            </thead>
            <tbody>
              <?php include_once("./controllers/showRecordsController.php"); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  //Imports the footer
  require_once("layouts/footer.php");
?>
