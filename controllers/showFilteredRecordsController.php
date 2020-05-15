<?php

  require_once("models/Connection.php");
  require_once("models/Records.php");
  require_once("models/UsersManagament.php");

  $from = $_POST["txtCalendarFrom"];
  $to = $_POST["txtCalendarTo"];

  echo "Desde: " . $from . " Hasta: " . $to . "<br>";

  $conn = new Connection();

  $records_list = Records::showFilteredRecords($conn, $from, $to);

  foreach ($records_list as $record) {
    echo "<tr>";
    echo "<td>" . $record["datetime_record"] . "</td>";
    echo "<td>" . $record["temperature_record"] . " ºC</td>";
    echo "<td>" . $record["humidity_record"] . " %</td>";
    echo "</tr>";
  }

?>
