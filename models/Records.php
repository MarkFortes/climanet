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

  }

?>
