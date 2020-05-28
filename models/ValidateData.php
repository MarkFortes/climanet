<?php
    class ValidateData{
        public static function existsUsername($conn, $username){
            $query = "SELECT * FROM users WHERE username_user = :username";
            $stmt = $conn->getConnection()->prepare($query);
            $stmt->bindValue(":username", $username);
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
          if ($stmt->rowCount() > 0) { //Quiere decir que existe el email pasado por parametro
            return true;
          }else { //No existe
            return false;
          }
        }
    }
?>
