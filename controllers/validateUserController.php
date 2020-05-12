<?php

  //Imports the necessary classes
  require_once("../models/Connection.php");
  require_once("../models/UsersManagament.php");

  if (isset($_POST["btnValidate"])) {
    $email = $_POST["txtEmail"];
    $pass = $_POST["txtPassword"];

    echo $email . "<br>";
    echo $pass . "<br>";

    $conn = new Connection();
    if (UsersManagament::validateUser($conn,$email,$pass) == true) {
      session_start();
      $id_user = UsersManagament::getId($conn, $email);
      $_SESSION["id_user"] = $id_user;
      $role = UsersManagament::getRole($conn, $id_user);
      if ($role == 1) { //role = 1 -> profesor
        header("Location:../homeTeacher.php");
      }else if ($role == 0) { //role = 0 -> alumno
        header("Location:../homeStudent.php");
      }
    }else {
      header("Location:../index.php");
    }
  }
?>
