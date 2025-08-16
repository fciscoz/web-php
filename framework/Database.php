<?php

class Database{
  
  private $connection;
  private $statement;

  public function __construct()
  {
  
    $dns = 'mysql:host=localhost;dbname=web-php;charset=utf8mb4';

    $this->connection = new PDO($dns, 'root', '123456');
  }

  public function query($sql, $params = [])
  {
    $this->statement = $this->connection->prepare($sql);
    $this->statement->execute($params);
    return $this;
  }

  public function get()
  {
      return $this->statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function firstOrFail()
  {
      $result = $this->statement->fetch(PDO::FETCH_ASSOC);
      if (!$result) {
        //throw new Exception("No matching record found");
        exit("No matching record found"); // or handle the error as needed 
      }
      return $result;
  }
}

?>