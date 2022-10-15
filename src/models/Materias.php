<?php 
  class Materias {
    // DB stuff
    private $conn;
    private $table = 'materias_reticula';

    // Post Properties
    public $id;
    public $clave;
    public $materia;
    public $semestre;
    public $hrs_practicas;
    public $hrs_teoricas;
    public $total_horas;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM `materias_reticula`;';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET clave = :clave,
          materia = :materia,
          semestre = :semestre,
          hrs_practicas = :hrs_practicas,
          hrs_teoricas = :hrs_teoricas,
          total_horas = :total_horas';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->clave = htmlspecialchars(strip_tags($this->clave));
          $this->materia = htmlspecialchars(strip_tags($this->materia));
          $this->semestre = htmlspecialchars(strip_tags($this->semestre));
          $this->hrs_practicas = htmlspecialchars(strip_tags($this->hrs_practicas));
          $this->hrs_teoricas = htmlspecialchars(strip_tags($this->hrs_teoricas));
          $this->total_horas = htmlspecialchars(strip_tags($this->total_horas));

          // Bind data
          $stmt->bindParam(':clave', $this->clave);
          $stmt->bindParam(':materia', $this->materia);
          $stmt->bindParam(':semestre', $this->semestre);
          $stmt->bindParam(':hrs_practicas', $this->hrs_practicas);
          $stmt->bindParam(':hrs_teoricas', $this->hrs_teoricas);
          $stmt->bindParam(':total_horas', $this->total_horas);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET clave = :clave,
                                materia = :materia,
                                semestre = :semestre,
                                hrs_practicas = :hrs_practicas,
                                hrs_teoricas = :hrs_teoricas,
                                total_horas = :total_horas
                                WHERE id = :id';


          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));
          $this->clave = htmlspecialchars(strip_tags($this->clave));
          $this->materia = htmlspecialchars(strip_tags($this->materia));
          $this->semestre = htmlspecialchars(strip_tags($this->semestre));
          $this->hrs_practicas = htmlspecialchars(strip_tags($this->hrs_practicas));
          $this->hrs_teoricas = htmlspecialchars(strip_tags($this->hrs_teoricas));
          $this->total_horas = htmlspecialchars(strip_tags($this->total_horas));

          // Bind data
          $stmt->bindParam(':id', $this->id);
          $stmt->bindParam(':clave', $this->clave);
          $stmt->bindParam(':materia', $this->materia);
          $stmt->bindParam(':semestre', $this->semestre);
          $stmt->bindParam(':hrs_practicas', $this->hrs_practicas);
          $stmt->bindParam(':hrs_teoricas', $this->hrs_teoricas);
          $stmt->bindParam(':total_horas', $this->total_horas);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }