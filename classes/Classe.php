<?php
require_once 'config/database.php';
class Classe {
    private $conn;
    private $table_name = "classes";

    public $id;
    public $nom_classe;
    public $niveau;
    public $capacite;
    public $professeur_principal_id;

    public function __construct($db) {
        $this->conn = $db;
    }

public function read() {
    $query = "SELECT c.*, p.nom as prof_nom, p.prenom as prof_prenom 
              FROM " . $this->table_name . " c 
              LEFT JOIN professeurs p ON c.professeur_principal_id = p.id 
              ORDER BY c.niveau ASC, c.nom_classe ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt; // Retourne un objet PDOStatement
}
}
?>
