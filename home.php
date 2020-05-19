<?php
  //Checks if the user has logged recently. If not, it will be redirected to index
  session_start();
  if (!isset($_SESSION["id_user"])) {
    header("Location:login.php");
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
      <div class="row">
        <div class="col-md-12">
          <form action="#tableRecords" method="post">
            <div class="form-group">
              <label>Últimos registros visibles: </label>
              <select class="form-control" name="txtLimit">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
                <option>Todos</option>
              </select>
            </div>
            <div class="form-group text-center">
              <button type="input" class="btn btn-primary btn-block" name="btnFilterLimit">Filtrar</button>
            </div>
          </form>
        </div>
      </div>
      <!--
      <hr style="border:0.5px solid black">
      <div class="row text-center">
        <div class="col-md-12">
          <form action="" method="post">
            <button type="input" class="btn btn-outline-danger btn-block" name="btnMaxTempRecord">Temperatura más alta</button>
            <button type="input" class="btn btn-outline-primary btn-block" name="btnMinTempRecord">Temperatura más baja</button>
          </form>
        </div>

        <div class="col-md-12">
          <form action="" method="post">
            <button type="input" class="btn btn-outline-danger btn-block" name="btnMaxHumRecord">Humedad más alta</button>
            <button type="input" class="btn btn-outline-primary btn-block" name="btnMinHumRecord">Humedad más baja</button>
          </form>
        </div>
      </div>
    -->
      <hr style="border:0.5px solid black">
      <div class="row">
        <div class="col-md-12">
          <form action="#tableRecords" method="post">
            <div class="form-group">
              <label>Desde: </label>
              <input type="date" class="form-control" name="txtCalendarFrom" id="txtCalendarFrom" required>
            </div>
            <div class="form-group">
              <label>Hasta: </label>
              <input type="date" class="form-control" name="txtCalendarTo" id="txtCalendarTo" required>
            </div>
            <div class="form-group">
              <label>Más especificaciones: </label>
              <select class="form-control" name="txtCalendarSpecification">
                <option>Todo</option>
                <option>Temperatura más alta</option>
                <option>Temperatura más baja</option>
                <option>Humedad más alta</option>
                <option>Humedad más baja</option>
              </select>
            </div>
            <div class="form-group text-center">
              <button type="input" class="btn btn-primary btn-block" name="btnFilterBetweenDates">Filtrar por fecha</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="row" id="tableRecords">
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

<!--Call to my own js functions-->
<script src="js/getDate.js"></script>
<script src="js/clsSignup.js"></script>

<?php
  //Imports the footer
  require_once("layouts/footer.php");
?>
