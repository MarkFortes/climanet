<?php
  class UsersManagament{

    public static function validateUser($conn, $email, $pass){
      $query = "SELECT * FROM users WHERE email_user = :email AND password_user = :pass";
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

    public static function createUser($conn, $username, $password, $email){
      $query = "INSERT INTO users (username_user, password_user, email_user) VALUES (:username, :password, :email)";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":username", $username);
      $stmt->bindValue(":password", $password);
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

    public static function getUsername($conn, $id){
      $query = "SELECT * FROM users WHERE id_user = :id";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":id", $id);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row["username_user"];
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
