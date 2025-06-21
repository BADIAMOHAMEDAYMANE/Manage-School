<?php
require_once "config/database.php";

class Professeurs { // Nom de la classe avec une majuscule
    private $conn;
    private $table_name = "professeurs"; // Nom de la table dans la base de données

    // Constructeur pour initialiser la connexion
    public function __construct($db) {
        $this->conn = $db;
    }

    // Méthode pour lire les données des professeurs
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>