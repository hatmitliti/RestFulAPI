<?php
class db
{

  private $servername = "localhost";
  private $username = "namngoc";
  private $password = "";
  private $db = "id16940556_hoadon";
  private $conn;

  public function connect()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->db . ";charset=utf8", $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "connect success";
    } catch (PDOException $e) {
      echo "connect fail: " . $e->getMessage();
    }
    return $this->conn;
  }
}
