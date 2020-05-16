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
      <h3>¡Bienvenido a Climanet, <b><?php echo UsersManagament::getUsername($conn, $id_user); ?></b>!</h3>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-4">
      <form action="" method="post">
        <div class="form-group">
          <label>Desde: </label>
          <input type="date" class="form-control" name="txtCalendarFrom" required>
        </div>
        <div class="form-group">
          <label>Hasta: </label>
          <input type="date" class="form-control" name="txtCalendarTo" required>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary" name="btnFilterBetweenDates">Filtrar</button>
        </div>
      </form>
    </div>
    <div class="col-md-8">
      <div class="row text-center">
        <div class="col-md-12">
          <form action="" method="post">
            <button type="input" class="btn btn-outline-danger" name="btnMaxTempRecord">Temperatura más alta</button>
            <button type="input" class="btn btn-outline-danger" name="btnMaxHumRecord">Humedad más alta</button>
          </form>
        </div>
        <div class="col-md-12">
          <form action="" method="post">
            <button type="input" class="btn btn-outline-primary" name="btnMinTempRecord">Temperatura más baja</button>
            <button type="input" class="btn btn-outline-primary" name="btnMinHumRecord">Humedad más baja</button>
          </form>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Fecha y hora</th>
                  <th scope="col">Temperatura</th>
                  <th scope="col">Humedad</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include_once("./controllers/showRecordsController.php");
                ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/main.js"></script>

<?php
  //Imports the footer
  require_once("layouts/footer.php");
?>
