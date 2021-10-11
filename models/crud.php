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

    $status = $query->execute() ? 1 : 0;
    $query->closeCursor();

    return $status;
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

  public static function viewUsers()
  {
    $query = Connection::connect()->prepare('SELECT id, name, lastname, city, inscription_date, email FROM users');
    $query->execute();

    $data = $query->fetchAll();
    $query->closeCursor();

    return $data;
  }

  public static function deleteUser($id)
  {
    $query = Connection::connect()->prepare('DELETE FROM users WHERE id=:id');
    $query->bindParam(':id', $id, PDO::PARAM_INT);

    $status = $query->execute() ? 1 : 0;
    $query->closeCursor();

    return $status;
  }

  public static function updateUser($modelData)
  {
    $query = Connection::connect()->prepare('UPDATE users SET name=:name, lastname=:lastname, city=:city, inscription_date=:inscription_date, email=:email WHERE id=:id');
    $query->bindParam(':name', $modelData['name'], PDO::PARAM_STR);
    $query->bindParam(':lastname', $modelData['lastname'], PDO::PARAM_STR);
    $query->bindParam(':city', $modelData['city'], PDO::PARAM_STR);
    $query->bindParam(':inscription_date', $modelData['inscription_date'], PDO::PARAM_STR);
    $query->bindParam(':email', $modelData['email'], PDO::PARAM_STR);
    $query->bindParam(':id', $modelData['id'], PDO::PARAM_INT);

    $status = $query->execute() ? 1 : 0;
    $query->closeCursor();

    return $status;
  }

  public static function searchUser($lastname)
  {
    $query = "SELECT id, name, lastname, city, inscription_date, email FROM users WHERE lastname LIKE :lastname";
    $bindings = [":lastname" => '%' . $lastname . '%'];

    $response = Connection::connect()->prepare($query);
    $response->execute($bindings);

    $data = $response->fetchAll(PDO::FETCH_ASSOC);
    $response->closeCursor();

    return $data;
  }

  public static function getUserById($id)
  {
    $query = Connection::connect()->prepare('SELECT id, name, lastname, city, inscription_date, email FROM users WHERE id=:id');
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetch();
    $query->closeCursor();

    return $data;
  }
}
