<?php

  if (isset($_POST["btnSignup"])) {
    //Imports necessary classes
    require_once("../models/Connection.php");
    require_once("../models/UsersManagament.php");
    require_once("../models/ValidateData.php");

    //Imports header
    require_once("../layouts/headerUnlogged.php");

    $username = $_POST["txtUsername"];
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];

    $conn = new Connection();

    $usernameAvailable;
    $emailAvailable;

    if (ValidateData::existsUsername($conn, $username) == false) { //Username disponible para asignar
      $usernameAvailable = true;
    }else {
      $usernameAvailable = false;
      include_once("../layouts/existingUserMessage.html");
    }

    if (ValidateData::existsEmail($conn, $email) == false) { //Password disponible para asignar
      $emailAvailable = true;
    }else {
      $emailAvailable = false;
      include_once("../layouts/existingEmailMessage.html");
    }

    if ($usernameAvailable == true && $emailAvailable == true) {
      UsersManagament::createUser($conn, $username, $password, $email);
      include_once("../layouts/correctUserCreationMessage.html");
    }else {
      include_once("../layouts/uncorrectUserCreationMessage.html");
    }
  }else {

  }

  //Imports footer
  require_once("../layouts/footer.php");
?>
