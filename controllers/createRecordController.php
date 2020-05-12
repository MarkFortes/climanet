<?php
  require_once("../models/Connection.php");
  require_once("../models/Records.php");

  $temperature = $_GET["temperature"];
  $humidity = $_GET["humidity"];

  echo "Temperatura: " . $temperature . "<br>";
  echo "Humedad: " . $humidity . "<br>";

  $conn = new Connection();
  Records::createRecord($conn, $temperature, $humidity);
?>
