<?php

  require_once("models/Connection.php");
  require_once("models/Records.php");
  require_once("models/UsersManagament.php");

  $conn = new Connection();
  $id_user = $_SESSION["id_user"];
  $records_list = Records::showRecords($conn,$id_user);

  foreach ($records_list as $record) {
    echo "<tr>";
    echo "<td>" . $record["check_record"] . "</td>";
    echo "<td>" . $record["departure_record"] . "</td>";
    echo "</tr>";
  }

?>
