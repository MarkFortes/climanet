<?php

  require_once("../modelos/Connection.php");
  require_once("../modelos/UsersManagament.php");
  require_once("../modelos/ValidateData.php");

  if (isset($_POST["btnEnviar"])) {
    $nick = $_POST["txtNickname"];
    $email = $_POST["txtEmail"];
    $pass = $_POST["txtPassword"];

    $conn = new Connection();

      $nickAvailable;
      $emailAvailable;
      //Nickname disponible para asignar
      if (ValidateData::existsNickname($conn, $nick) == false) {
        $nickAvailable = true;
      }else {
        $nickAvailable = false;
        echo "Nombre de usuario ya registrado.";
      }

      if (ValidateData::existsEmail($conn, $email) == false) {
        $emailAvailable = true;
      }else {
        $emailAvailable = false;
        echo "Email ya registrado.";
      }

      if ($nickAvailable == true && $emailAvailable == true) {
        UsersManagament::createUser($conn, $nick, $pass, $email);
        header("Location:../login.php");
      }else {
        "Usuario no disponible";
      }
  }

?>
