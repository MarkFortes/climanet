<?php

    require_once("Connection.php");

    class ValidateData{

        public static function existsNickname($conn, $nick){
            $query = "SELECT * FROM users WHERE nick_user = :nick";
            $stmt = $conn->getConnection()->prepare($query);
            $stmt->bindValue(":nick", $nick);
            $stmt->execute();
            if ($stmt->rowCount() > 0) { //Quiere decir que existe el username pasado por parametro
              return true;
            }else { //No existe
              return false;
            }
        }

        public static function existsEmail($conn, $email){
          $query = "SELECT * FROM users WHERE email_user = :email";
          $stmt = $conn->getConnection()->prepare($query);
          $stmt->bindValue(":email", $email);
          $stmt->execute();
          if ($stmt->rowCount() > 0) { //Quiere decir que existe el username pasado por parametro
            return true;
          }else { //No existe
            return false;
          }
        }

        public function correctPasswordFormat($pass){
          if (strlen($pass) >= 6) {
            return true;
          }else {
            return false;
          }
        }

    }

?>
