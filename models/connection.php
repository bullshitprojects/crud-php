<?php
class Connection
{

  const HOST = 'localhost';
  const DBNAME = 'crudPHP';
  const USER = 'develop';
  const PASS = 'develop';

  public static function connect()
  {
    $connection_string  = Connection::buildConnectionString();

    $connection = new PDO($connection_string, self::USER, self::PASS);


    return $connection;
  }

  private static function buildConnectionString()
  {
    $string = 'mysql:host=';
    $string .= self::HOST;
    $string .= ';dbname=';
    $string .= self::DBNAME;

    return $string;
  }
}
