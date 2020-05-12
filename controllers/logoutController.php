<?php
  session_start();

  if (isset($_SESSION["id_user"])) {
    unset($_SESSION["id_user"]);
    setcookie("name_user", "", time() - 3600);
    header("Location:../index.php");
  }
?>
