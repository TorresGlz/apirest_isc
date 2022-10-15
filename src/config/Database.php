<?php 
  class Database {
    // Parametros de BD
    private $host = '172.22.0.1:3307';
    private $db_name = 'reticulaisc';
    private $username = 'usernew';
    private $password = ' ';
    private $conn;

    // Conexion con BD
    public function connect() {
      $this->conn;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Error en la conexion: ' . $e->getMessage();
      }
      return $this->conn;
    }
  }