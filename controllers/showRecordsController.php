<?php

  require_once("models/Connection.php");
  require_once("models/Records.php");
  require_once("models/UsersManagament.php");

  $conn = new Connection();

  if (isset($_POST["btnFilterBetweenDates"])) {

    $from = $_POST["txtCalendarFrom"];
    $to = $_POST["txtCalendarTo"];
    $specification = $_POST["txtCalendarSpecification"];
    echo "Mostrando <b>" . lcfirst($specification) . "</b> desde el <b>" . $from . "</b> hasta el <b>" . $to . "</b><br>";
    $records_list = Records::showFilterBetweenDates($conn, $from, $to, $specification);

  }elseif (isset($_POST["btnMaxTempRecord"])) {

    $records_list = Records::showMaxTempRecord($conn);

  }elseif (isset($_POST["btnMinTempRecord"])) {

    $records_list = Records::showMinTempRecord($conn);

  }elseif (isset($_POST["btnMaxHumRecord"])) {

    $records_list = Records::showMaxHumRecord($conn);

  }elseif (isset($_POST["btnMinHumRecord"])) {

    $records_list = Records::showMinHumRecord($conn);

  }else if (isset($_POST["btnFilterLimit"])) {

    $limit = $_POST["txtLimit"];
    if ($limit == "Todos") {
      echo "Mostrando <b>todos</b> los registros.";
    }else {
      echo "Mostrando los <b>" . $limit . "</b> últimos registros.";
    }
    $records_list = Records::showFilterLimitRecords($conn, $limit);

  }else{ //Si no se ha hecho ningun filtro se muestran los 100 ultimos registros

    $records_list = Records::showUnfilteredRecords($conn);

  }

  foreach ($records_list as $record) {
    echo "<tr>";
    echo "<td>" . $record["datetime_record"] . "</td>";
    echo "<td>" . $record["temperature_record"] . " ºC</td>";
    echo "<td>" . $record["humidity_record"] . " %</td>";
    echo "</tr>";
  }

?>
