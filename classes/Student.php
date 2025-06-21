<?php
require_once "config/database.php";
class Student {
    private $conn;
    private $table_name = "etudiants";

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $classe_id;
    public $date_naissance;
    public $date_inscription;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT e.*, c.nom_classe 
                  FROM " . $this->table_name . " e 
                  LEFT JOIN classes c ON e.classe_id = c.id 
                  ORDER BY e.nom ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>