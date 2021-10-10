<?php
require_once 'connection.php';

class Data extends Connection
{
  public static function newUser($modelData)
  {

    $query = Connection::connect()->prepare('INSERT INTO users (name, lastname, city, inscription_date, email) VALUES (:name, :lastname, :city, :inscription_date, :email)');

    $query->bindParam(':name', $modelData['name'], PDO::PARAM_STR);
    $query->bindParam(':lastname', $modelData['lastname'], PDO::PARAM_STR);
    $query->bindParam(':city', $modelData['city'], PDO::PARAM_STR);
    $query->bindParam(':inscription_date', $modelData['inscription_date'], PDO::PARAM_STR);
    $query->bindParam(':email', $modelData['email'], PDO::PARAM_STR);

    $query->execute() ? 1 : 0;

    $query->closeCursor();
  }

  public static function login($modelData)
  {
    $query = Connection::connect()->prepare('SELECT username FROM users_login WHERE username=:username AND user_pass=:user_pass');

    $query->bindParam(':username', $modelData['username'], PDO::PARAM_STR);
    $query->bindParam(':user_pass', $modelData['password'], PDO::PARAM_STR);

    $query->execute();
    $data = $query->fetch();

    $query->closeCursor();

    return $data;
  }
}
