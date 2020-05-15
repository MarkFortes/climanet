<?php

  //Imports the necessary classes
  require_once("../models/Connection.php");
  require_once("../models/UsersManagament.php");

  if (isset($_POST["btnLogin"])) {
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];

    echo $email . "<br>";
    echo $password . "<br>";

    $conn = new Connection();
    if (UsersManagament::validateUser($conn,$email,$password) == true) {
      session_start();
      $id_user = UsersManagament::getId($conn, $email);
      $_SESSION["id_user"] = $id_user;
      header("Location:../home.php");
    }else {
      header("Location:../index.php");
    }
  }

?>
