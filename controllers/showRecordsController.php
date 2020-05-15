<?php

  require_once("models/Connection.php");
  require_once("models/Records.php");
  require_once("models/UsersManagament.php");

  $conn = new Connection();
  $id_user = $_SESSION["id_user"];
  $records_list = Records::showRecords($conn,$id_user);

  foreach ($records_list as $record) {
    echo "<tr>";
    echo "<td>" . $record["datetime_record"] . "</td>";
    echo "<td>" . $record["temperature_record"] . " ºC</td>";
    echo "<td>" . $record["humidity_record"] . " %</td>";
    echo "</tr>";
  }

?>
