<?php

  require_once("../modelos/Connection.php");
  require_once("../modelos/Movements.php");
  require_once("../modelos/UsersManagament.php");

  //REGISTRAR MOVIMIENTO////////////////////////////////////////////////////////////////////////////
  if (isset($_POST["btnRegistrarMovimiento"])) {
    $conn = new Connection();

    $cantidad = $_POST["txtCantidad"];
    $fecha = $_POST["txtFecha"];
    $accion = $_POST["radioAccion"];
    $motivo = $_POST["txtMotivo"];

    session_start();
    $nick = $_SESSION["nick"];
    $id_user = UsersManagament::getId($conn, $nick);

    Movements::createMovement($conn,$id_user,$cantidad,$fecha,$accion,$motivo);
    header("Location:../home.php");
  }

  //ELIMINAR MOVIMIENTO////////////////////////////////////////////////////////////////////////////
  if (isset($_POST["btnEliminarMovimiento"])) {
    $conn = new Connection();
    $id_mov = $_POST["txtIdMovimiento"];

    Movements::deleteMovement($conn,$id_mov);
    header("Location:../home.php");
  }


 ?>
