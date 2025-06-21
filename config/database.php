<?php
class Database {
    private $host = "localhost"; // Adresse du serveur
    private $db_name = "ecole_db"; // Nom de la base de données
    private $username = "root"; // Nom d'utilisateur MySQL
    private $password = ""; // Mot de passe MySQL
    public $conn;

    // Méthode pour établir la connexion à la base de données
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
        return $this->conn;
    }
}

// Vérifier si la fonction existe avant de la déclarer
if (!function_exists('is_port_open')) {
    function is_port_open($host, $port) {
        $connection = @fsockopen($host, $port, $errno, $errstr, 5);
        if ($connection) {
            fclose($connection);
            return true;
        }
        return false;
    }
}
?>