<?php

  class Records{

    public static function createRecord($conn,$temperature,$humidity){ //arduino llama a esta funcion para los registros
      try {
        $query = "INSERT INTO records (temperature_record, humidity_record) VALUES (:temperature,:humidity)";
        $stmt = $conn->getConnection()->prepare($query);
        $stmt->bindValue(":temperature", $temperature);
        $stmt->bindValue(":humidity", $humidity);
        $stmt->execute();
        echo "Registro realizado";
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public static function showUnfilteredRecords($conn){
      echo "Mostrando los <b>10</b> últimos registros.";
      $query = "SELECT * FROM records ORDER BY id_record DESC LIMIT 10";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }

    public static function showFilterLimitRecords($conn,$limit){
      if ($limit == "Todo") {
        $query = "SELECT * FROM records ORDER BY id_record DESC";
      }else {
        $query = "SELECT * FROM records ORDER BY id_record DESC LIMIT $limit";
      }
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }

    public static function showFilterBetweenDates($conn, $from, $to, $specification){
      if ($specification == "Todo") {
        $query = "SELECT * FROM records WHERE datetime_record > '$from' AND datetime_record < '$to 23:59:59' ORDER BY id_record DESC";
      }else if ($specification == "Temperatura más alta") {
        $query = "SELECT *
                  FROM records
                  WHERE temperature_record = (SELECT MAX(temperature_record) FROM records WHERE datetime_record > '$from' AND datetime_record < '$to 23:59:59')
                  AND datetime_record > '$from' AND datetime_record < '$to 23:59:59'";
      }else if ($specification == "Temperatura más baja") {
        $query = "SELECT *
                  FROM records
                  WHERE temperature_record = (SELECT MIN(temperature_record) FROM records WHERE datetime_record > '$from' AND datetime_record < '$to 23:59:59')
                  AND datetime_record > '$from' AND datetime_record < '$to 23:59:59'";
      }else if ($specification == "Humedad más alta") {
        $query = "SELECT *
                  FROM records
                  WHERE humidity_record = (SELECT MAX(humidity_record) FROM records WHERE datetime_record > '$from' AND datetime_record < '$to 23:59:59')
                  AND datetime_record > '$from' AND datetime_record < '$to 23:59:59'";
      }else if ($specification == "Humedad más baja") {
        $query = "SELECT *
                  FROM records
                  WHERE humidity_record = (SELECT MIN(humidity_record) FROM records WHERE datetime_record > '$from' AND datetime_record < '$to 23:59:59')
                  AND datetime_record > '$from' AND datetime_record < '$to 23:59:59'";
      }
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }

    public static function showMaxTempRecord($conn){
      $query = "SELECT * FROM records WHERE temperature_record = (SELECT MAX(temperature_record) FROM records) ORDER BY id_record DESC";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }

    public static function showMinTempRecord($conn){
      $query = "SELECT * FROM records WHERE temperature_record = (SELECT MIN(temperature_record) FROM records) ORDER BY id_record DESC";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }

    public static function showMaxHumRecord($conn){
      $query = "SELECT * FROM records WHERE humidity_record = (SELECT MAX(humidity_record) FROM records) ORDER BY id_record DESC";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }

    public static function showMinHumRecord($conn){
      $query = "SELECT * FROM records WHERE humidity_record = (SELECT MIN(humidity_record) FROM records) ORDER BY id_record DESC";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }

  }

?>
