<?php

  class UsersManagament{

    public static function validateUser($conn, $email, $pass){
      $query = "SELECT * FROM users WHERE email_user = :email AND pwd_user = :pass";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":email", $email);
      $stmt->bindValue(":pass", $pass);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        return true;
      }else {
        return false;
      }
    }

    public static function createUser($conn, $nick, $pass, $email){
      $query = "INSERT INTO users (nick_user, pass_user, email_user) VALUES (:nick, :pass, :email)";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":nick", $nick);
      $stmt->bindValue(":pass", $pass);
      $stmt->bindValue(":email", $email);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        return true;
      }else {
        return false;
      }
    }

    public static function getId($conn, $email){
      $query = "SELECT id_user FROM users WHERE email_user = :email";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":email", $email);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row["id_user"];
    }

    public static function getName($conn, $id){
      $query = "SELECT * FROM users WHERE id_user = :id";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":id", $id);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row["name_user"];
    }

    public static function getRole($conn, $id){
      $query = "SELECT * FROM users WHERE id_user = :id";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":id", $id);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row["admin_user"];
    }

  }


?>
