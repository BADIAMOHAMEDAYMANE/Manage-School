<?php
$host = 'localhost';
$port = '3306';
$db_name = 'ecole_db';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");

    // Test de connexion avec affichage
    echo "<h2>✅ Connexion réussie !</h2>";
    echo "<p><strong>Base de données :</strong> $db_name</p>";
    echo "<p><strong>Host :</strong> $host:$port</p>";
    echo "<p><strong>Utilisateur :</strong> $username</p>";

    // Connexion testée avec succès

} catch(PDOException $e) {
    echo "<h2>❌ Erreur de connexion</h2>";
    echo "<p style='color: red;'>" . $e->getMessage() . "</p>";
}
?>