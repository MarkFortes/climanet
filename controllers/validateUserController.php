<?php
  if (isset($_POST["btnLogin"])) {
    //Imports the necessary classes
    require_once("../models/Connection.php");
    require_once("../models/UsersManagament.php");

    //Imports header
    require_once("../layouts/headerUnlogged.php");

    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];

    $conn = new Connection();
    if (UsersManagament::validateUser($conn,$email,$password) == true) {
      session_start();
      $id_user = UsersManagament::getId($conn, $email);
      $_SESSION["id_user"] = $id_user;
      header("Location:../home.php");
    }else {
      include_once("../layouts/uncorrectUserValidationMessage.html");
    }
  }

  //Imports footer
  require_once("../layouts/footer.php");
?>
