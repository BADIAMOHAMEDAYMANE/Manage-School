<?php

namespace classes;
include("../config/database.php");

class Professor
{
    private $conn;
    private $table_name = "professeurs";

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $matiere;
    public $date_embauche;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nom ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}