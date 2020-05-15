<?php

  require_once("../models/Connection.php");
  require_once("../models/UsersManagament.php");
  require_once("../models/ValidateData.php");

  if (isset($_POST["btnSignup"])) {
    $username = $_POST["txtUsername"];
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];

    $conn = new Connection();

    $usernameAvailable;
    $emailAvailable;

    if (ValidateData::existsUsername($conn, $username) == false) { //Username disponible para asignar
      $usernameAvailable = true;
      echo "Username disponible <br>";
    }else {
      $usernameAvailable = false;
      echo "Nombre de usuario ya registrado. <br>";
    }

    if (ValidateData::existsEmail($conn, $email) == false) { //Password disponible para asignar
      $emailAvailable = true;
      echo "Email disponible. <br>";
    }else {
      $emailAvailable = false;
      echo "Email ya registrado. <br>";
    }

    if ($usernameAvailable == true && $emailAvailable == true) {
      UsersManagament::createUser($conn, $username, $password, $email);
      header("Location:../login.php");
    }else {
      echo "Usuario no disponible";
    }
  }else {
    echo "Se ha producido un error al crear la cuenta de usuario";
  }

?>
