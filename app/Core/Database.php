<?php

namespace Pkl\MyApp\Core;

use PDO;
use PDOException;

class Database
{
  private $conn;
  private $stmt;
  private $tableName;
  private $column = [];

  public function __construct()
  {
    $this->conn = $this->setConnection();
  }

  public function setTableName($tableName)
  {
    $this->tableName = $tableName;
  }

  public function setColumn($column)
  {
    $this->column = $column;
  }

  protected function setConnection()
  {
    try {
      $host = $_ENV['DB_HOST'];
      $user = $_ENV['DB_USERNAME'];
      $pass = $_ENV['DB_PASSWORD'];
      $db = $_ENV['DB_DATABASE'];
      $port = $_ENV['DB_PORT'];
      $conn = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function qry($query, $params = array())
  {
    $this->stmt = $this->conn->prepare($query);
    $this->stmt->execute($params);
    return $this->stmt;
  }

  public function get($params = array())
  {
    $column = implode(",", $this->column);
    $query = "SELECT $column FROM {$this->tableName}";
    $paramValue = [];
    if (!empty($params)) {
      $query .= " WHERE 1=1 ";
      foreach ($params as $key => $value) {
        $query .= " AND {$key} = ? ";
        array_push($paramValue, $value);
      }
    }
    return $this->qry($query, $paramValue);
  }

  public function insertData($data = array())
  {
    if (empty($data)) {
      return false;
    }
    $columnValue = [];
    $kolom = [];
    $param = [];
    foreach ($data as $key => $value) {
      array_push($kolom, $key);
      array_push($columnValue, $value);
      array_push($param, "?");
    }
    $kolom = implode(", ", $kolom);
    $param = implode(", ", $param);
    $query = "INSERT INTO {$this->tableName} ($kolom) VALUES ($param)";
    // return $this->qry($query, $columnValue);
    $this->qry($query, $columnValue);
    return $this->conn->lastInsertId();
  }

  public function create($data = array())
  {
    if (empty($data)) {
      return false;
    }
    $columnValue = [];
    $kolom = [];
    $param = [];
    foreach ($data as $key => $value) {
      array_push($kolom, $key);
      array_push($columnValue, $value);
      array_push($param, "?");
    }
    $kolom = implode(", ", $kolom);
    $param = implode(", ", $param);
    $query = "INSERT INTO {$this->tableName} ($kolom) VALUES ($param)";
    return $this->qry($query, $columnValue);
  }

  public function updateData($data = array(), $param = array())
  {
    if (empty($data)) {
      return false;
    }
    $columnValue = [];
    $kolom = [];
    $query = "UPDATE {$this->tableName} ";
    foreach ($data as $key => $value) {
      array_push($kolom, $key . "= ? ");
      array_push($columnValue, $value);
    }
    $kolom = implode(", ", $kolom);
    $query = $query . " SET $kolom WHERE 1=1 ";
    $whereColumn = [];
    foreach ($param as $key => $value) {
      array_push($whereColumn, "AND {$key} = ?");
      array_push($columnValue, $value);
    }
    $whereColumn = implode(", ", $whereColumn);
    $query = $query . $whereColumn;
    return $this->qry($query, $columnValue);
  }

  public function deleteData($param = array())
  {
    if (empty($param)) {
      return false;
    }
    $query = "DELETE FROM {$this->tableName} WHERE 1=1 ";
    $whereColumn = [];
    $columnValue = [];
    foreach ($param as $key => $value) {
      array_push($whereColumn, "AND {$key} = ?");
      array_push($columnValue, $value);
    }
    $whereColumn = implode(",", $whereColumn);
    $query = $query . $whereColumn;
    return $this->qry($query, $columnValue);
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}
