<?php

// Correction du chemin - le fichier database.php est dans le même dossier
include 'database.php';

// Création d'une instance PDO directement (puisque database.php crée $conn)
function installDatabase($conn) {
    try {
        if ($conn === null) {
            throw new Exception("Impossible de se connecter à la base de données");
        }

        echo "<h2>🚀 Installation de la base de données École Excellence</h2>";
        echo "<div style='font-family: Arial; max-width: 800px; margin: 20px;'>";

        // Création de la table 'professeurs'
        echo "<p>📋 Création de la table 'professeurs'...</p>";
        $conn->exec("
            CREATE TABLE IF NOT EXISTS professeurs (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(100) NOT NULL,
                prenom VARCHAR(100) NOT NULL,
                email VARCHAR(150) UNIQUE NOT NULL,
                matiere VARCHAR(100) NOT NULL,
                date_embauche DATE NOT NULL
            )
        ");
        echo "<p style='color: green;'>✅ Table 'professeurs' créée avec succès</p>";

        // Création de la table 'classes'
        echo "<p>📋 Création de la table 'classes'...</p>";
        $conn->exec("
            CREATE TABLE IF NOT EXISTS classes (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom_classe VARCHAR(50) NOT NULL UNIQUE,
                niveau VARCHAR(20) NOT NULL,
                capacite INT NOT NULL DEFAULT 30,
                professeur_principal_id INT,
                FOREIGN KEY (professeur_principal_id) REFERENCES professeurs(id) ON DELETE SET NULL
            )
        ");
        echo "<p style='color: green;'>✅ Table 'classes' créée avec succès</p>";

        // Création de la table 'etudiants'
        echo "<p>📋 Création de la table 'etudiants'...</p>";
        $conn->exec("
            CREATE TABLE IF NOT EXISTS etudiants (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(100) NOT NULL,
                prenom VARCHAR(100) NOT NULL,
                email VARCHAR(150) UNIQUE,
                classe_id INT,
                date_naissance DATE NOT NULL,
                FOREIGN KEY (classe_id) REFERENCES classes(id) ON DELETE SET NULL
            )
        ");
        echo "<p style='color: green;'>✅ Table 'etudiants' créée avec succès</p>";

        // Vérifier si des données existent déjà
        $stmt = $conn->query("SELECT COUNT(*) FROM professeurs");
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            echo "<br><h3>📊 Insertion des données d'exemple...</h3>";

            // Insertion des professeurs
            echo "<p>👨‍🏫 Insertion des professeurs...</p>";
            $conn->exec("
                INSERT INTO professeurs (id, nom, prenom, email, matiere, date_embauche) VALUES
                (1, 'Dubois', 'Marie', 'marie.dubois@ecole.fr', 'Mathématiques', '2020-09-01'),
                (2, 'Martin', 'Pierre', 'pierre.martin@ecole.fr', 'Français', '2019-09-01'),
                (3, 'Bernard', 'Sophie', 'sophie.bernard@ecole.fr', 'Histoire', '2021-09-01'),
                (4, 'Petit', 'Jean', 'jean.petit@ecole.fr', 'Sciences', '2018-09-01'),
                (5, 'Moreau', 'Alice', 'alice.moreau@ecole.fr', 'Anglais', '2022-09-01')
            ");
            echo "<p style='color: green;'>✅ 5 professeurs ajoutés</p>";

            // Insertion des classes
            echo "<p>🏫 Insertion des classes...</p>";
            $conn->exec("
                INSERT INTO classes (id, nom_classe, niveau, capacite, professeur_principal_id) VALUES
                (1, '6ème A', '6ème', 25, 1),
                (2, '6ème B', '6ème', 25, 2),
                (3, '5ème A', '5ème', 28, 3),
                (4, '5ème B', '5ème', 28, 4),
                (5, '4ème A', '4ème', 30, 5),
                (6, '4ème B', '4ème', 30, 1),
                (7, '3ème A', '3ème', 30, 2),
                (8, '3ème C', '3ème', 30, 3)
            ");
            echo "<p style='color: green;'>✅ 8 classes ajoutées</p>";

            // Insertion des étudiants
            echo "<p>👨‍🎓 Insertion des étudiants...</p>";
            $conn->exec("
                INSERT INTO etudiants (id, nom, prenom, email, classe_id, date_naissance) VALUES
                (1, 'Leblanc', 'Emma', 'emma.leblanc@etudiant.fr', 1, '2010-05-15'),
                (2, 'Rousseau', 'Lucas', 'lucas.rousseau@etudiant.fr', 3, '2009-08-22'),
                (3, 'Garnier', 'Chloé', 'chloe.garnier@etudiant.fr', 5, '2008-12-10'),
                (4, 'Faure', 'Hugo', 'hugo.faure@etudiant.fr', 8, '2007-03-18'),
                (5, 'Andre', 'Léa', 'lea.andre@etudiant.fr', 2, '2010-11-07'),
                (6, 'Mercier', 'Nathan', 'nathan.mercier@etudiant.fr', 4, '2009-01-25'),
                (7, 'Blanc', 'Manon', 'manon.blanc@etudiant.fr', 6, '2008-09-14'),
                (8, 'Guerin', 'Tom', 'tom.guerin@etudiant.fr', 7, '2007-06-30')
            ");
            echo "<p style='color: green;'>✅ 8 étudiants ajoutés</p>";

        } else {
            echo "<p style='color: orange;'>⚠️ Les données existent déjà. Aucune insertion effectuée.</p>";
        }

        // Résumé de l'installation
        echo "<br><h3>📈 Résumé de l'installation :</h3>";

        $stmt = $conn->query("SELECT COUNT(*) FROM professeurs");
        $profCount = $stmt->fetchColumn();
        echo "<p>👨‍🏫 Professeurs : <strong>$profCount</strong></p>";

        $stmt = $conn->query("SELECT COUNT(*) FROM classes");
        $classCount = $stmt->fetchColumn();
        echo "<p>🏫 Classes : <strong>$classCount</strong></p>";

        $stmt = $conn->query("SELECT COUNT(*) FROM etudiants");
        $studentCount = $stmt->fetchColumn();
        echo "<p>👨‍🎓 Étudiants : <strong>$studentCount</strong></p>";

        echo "<br><div style='background: #d4edda; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px;'>";
        echo "<h3 style='color: #155724; margin: 0;'>🎉 Installation terminée avec succès !</h3>";
        echo "<p style='color: #155724; margin: 5px 0 0 0;'>Votre base de données est maintenant prête à être utilisée.</p>";
        echo "</div>";

        echo "<br><p><strong>⚠️ Important :</strong> Supprimez ce fichier install.php après l'installation pour des raisons de sécurité.</p>";
        echo "</div>";

    } catch(PDOException $e) {
        echo "<div style='color: red; font-family: Arial; max-width: 800px; margin: 20px;'>";
        echo "<h3>❌ Erreur lors de l'installation</h3>";
        echo "<p>Erreur PDO : " . $e->getMessage() . "</p>";
        echo "</div>";
    } catch(Exception $e) {
        echo "<div style='color: red; font-family: Arial; max-width: 800px; margin: 20px;'>";
        echo "<h3>❌ Erreur lors de l'installation</h3>";
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
        echo "</div>";
    }
}

// Exécuter l'installation avec la connexion du fichier database.php
installDatabase($conn);
?>