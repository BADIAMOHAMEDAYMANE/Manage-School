<?php
// Activer l'affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure les fichiers nécessaires
require_once 'config/database.php';
require_once 'classes/Student.php'; // Inclure le fichier contenant la classe Student
require_once 'classes/Classe.php'; // Inclure le fichier contenant la classe Classe

// Créer une instance de la classe Database et établir la connexion
$database = new Database();
$db = $database->getConnection();

// Créer une instance des classes Student et Classe
$student = new Student($db);
$classe = new Classe($db);

// Récupérer les données des étudiants et des classes
$stmt_students = $student->read();
$stmt_classes = $classe->read();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants par Classe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f4f4f9; /* Couleur de fond douce */
        font-family: Arial, sans-serif;
    }
    .table-container {
        margin: 20px auto;
        max-width: 1200px;
        background-color: #ffffff; /* Fond blanc pour la table */
        border-radius: 8px; /* Coins arrondis */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre douce */
        padding: 20px;
    }
    .page-header {
        padding: 20px 0;
        border-bottom: 2px solid #6c757d; /* Ligne grise sous le titre */
        margin-bottom: 30px;
        text-align: center;
    }
    .page-header h1 {
        color: #343a40; /* Couleur du titre */
        font-size: 2.5rem;
    }
    .table th {
        background-color:#ADFF2F; /* Couleur de l'en-tête */
        color: black; /* Texte blanc */
    }
    .table td {
        vertical-align: middle; /* Centrer le texte verticalement */
        color: #343a40; /* Couleur du texte */
    }
    .class-header {
        background-color: #1E3A8A; /* Couleur bleue pour les classes */
        color: #ffffff; /* Texte blanc */
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .class-header h2 {
        margin: 0;
        font-size: 1.5rem;
    }
    .class-header p {
        margin: 0;
        font-size: 1rem;
    }
    .alert-info {
        background-color: #e9ecef; /* Couleur douce pour les alertes */
        color: #343a40; /* Texte sombre */
        border: 1px solid #ced4da; /* Bordure grise */
    }
</style>
</head>
<body>
    <div class="table-container">
    <?php if ($stmt_classes->rowCount() > 0): ?>
        <?php while ($class_row = $stmt_classes->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="class-header">
                <h2>Classe : <?php echo htmlspecialchars($class_row['nom_classe']); ?> (<?php echo htmlspecialchars($class_row['niveau']); ?>)</h2>
                <p>Professeur Principal : <?php echo htmlspecialchars($class_row['prof_nom'] . " " . $class_row['prof_prenom']); ?></p>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Date de Naissance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt_students = $student->read();
                        $has_students = false;
                        while ($student_row = $stmt_students->fetch(PDO::FETCH_ASSOC)):
                            if ($student_row['classe_id'] == $class_row['id']):
                                $has_students = true;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($student_row['id']); ?></td>
                                <td><?php echo htmlspecialchars($student_row['nom']); ?></td>
                                <td><?php echo htmlspecialchars($student_row['prenom']); ?></td>
                                <td><?php echo htmlspecialchars($student_row['email']); ?></td>
                                <td><?php echo htmlspecialchars($student_row['date_naissance']); ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php if (!$has_students): ?>
                            <tr>
                                <td colspan="7" class="text-center">Aucun étudiant dans cette classe.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            Aucune classe trouvée dans la base de données.
        </div>
    <?php endif; ?>
</div>
    </body>
</html>