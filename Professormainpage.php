<?php
// Activer l'affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure les fichiers nécessaires
require_once "config/database.php";
require_once "classes/professeurs.php";
$database = new database();
$db = $database->getConnection();

// Créer une instance de la classe Professor
$professeurs = new professeurs($db);

// Récupérer les données des professeurs
$stmt = $professeurs->read();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Professeurs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond douce */
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
            border-bottom: 2px solid #007bff; /* Ligne bleue sous le titre */
            margin-bottom: 30px;
            text-align: center;
        }
        .page-header h1 {
            color: #007bff; /* Couleur du titre */
            font-size: 2.5rem;
        }
        .table {
            margin-top: 20px;
        }
        .table th {
            background-color: #007bff; /* Couleur de l'en-tête */
            color: #ffffff; /* Texte blanc */
        }
        .table td {
            vertical-align: middle; /* Centrer le texte verticalement */
        }
        .btn-edit {
            background-color: #ffc107; /* Couleur jaune pour le bouton Éditer */
            color: #ffffff;
        }
        .btn-edit:hover {
            background-color: #e0a800; /* Couleur jaune foncée au survol */
        }
        .btn-delete {
            background-color: #dc3545; /* Couleur rouge pour le bouton Supprimer */
            color: #ffffff;
        }
        .btn-delete:hover {
            background-color: #c82333; /* Couleur rouge foncée au survol */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Liste des Professeurs</h1>
        </div>

        <div class="table-container">
            <?php if ($stmt->rowCount() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Matière</th>
                                <th>Date d'embauche</th>
                                <th>Actions</th> <!-- Colonne pour les boutons -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['nom']); ?></td>
                                    <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['matiere']); ?></td>
                                    <td><?php echo htmlspecialchars($row['date_embauche']); ?></td>
                                    <td>
                                        <!-- Bouton Éditer -->
                                        <a href="edit_professeur.php?id=<?php echo $row['id']; ?>" class="btn btn-edit btn-sm">
                                            Éditer
                                        </a>
                                        <!-- Bouton Supprimer -->
                                        <a href="delete_professeur.php?id=<?php echo $row['id']; ?>" class="btn btn-delete btn-sm">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center" role="alert">
                    Aucun professeur trouvé dans la base de données.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>