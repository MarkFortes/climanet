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
      //Nickname disponible para asignar
      if (ValidateData::existsUsername($conn, $username) == false) {
        $usernameAvailable = true;
      }else {
        $usernameAvailable = false;
        echo "Nombre de usuario ya registrado.";
      }

      if (ValidateData::existsEmail($conn, $email) == false) {
        $emailAvailable = true;
      }else {
        $emailAvailable = false;
        echo "Email ya registrado.";
      }

      if ($usernameAvailable == true && $emailAvailable == true) {
        UsersManagament::createUser($conn, $username, $password, $email);
        header("Location:../login.php");
      }else {
        echo "Usuario no disponible";
      }
  }

?>
