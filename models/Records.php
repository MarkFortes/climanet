<?php

  class Records{

    public static function createRecord($conn,$temperature,$humidity){
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

    public static function showRecords($conn, $id_user){
      $query = "SELECT * FROM records ORDER BY id_record DESC";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }
  }

?>
