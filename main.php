<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>École Excellence - Gestion</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: rgba(255,255,255,0.2);
        }

        main {
            flex: 1;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
            width: 100%;
        }

        .hero {
            text-align: center;
            padding: 3rem 0;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .hero h2 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .content-section {
            display: none;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .content-section.active {
            display: block;
        }

        .section-title {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            border-bottom: 3px solid #3498db;
            padding-bottom: 0.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #2c3e50;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        footer {
            background: #2c3e50;
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: #3498db;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: white;
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 50%;
            background-color: #3498db;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .social-links a:hover {
            background-color: #2980b9;
        }

        .contact-info p {
            margin-bottom: 0.5rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #3498db;
        }

        .stat-label {
            color: #666;
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 1rem;
            }

            .hero h2 {
                font-size: 2rem;
            }

            nav {
                flex-direction: column;
                gap: 1rem;
            }

            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
<header>
    <nav>
        <div class="logo">
            <h1>🎓 École Excellence</h1>
        </div>
        <ul class="nav-links">
            <li><a href="#" onclick="showSection('home')">Accueil</a></li>
            <li><a href="#" onclick="showSection('professeurs')">Professeurs</a></li>
            <li><a href="#" onclick="showSection('etudiants')">Étudiants</a></li>
            <li><a href="#" onclick="showSection('classes')">Classes</a></li>
        </ul>
    </nav>
</header>

<main>
    <!-- Page d'accueil -->
    <section id="home" class="content-section active">
        <div class="hero">
            <h2>Bienvenue à l'École Excellence</h2>
            <p>Votre plateforme de gestion scolaire complète. Gérez facilement vos professeurs, étudiants et classes avec notre système intuitif.</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" id="prof-count">0</div>
                <div class="stat-label">Professeurs</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="student-count">0</div>
                <div class="stat-label">Étudiants</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="class-count">0</div>
                <div class="stat-label">Classes</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">15</div>
                <div class="stat-label">Années d'expérience</div>
            </div>
        </div>
    </section>

    <!-- Liste des professeurs -->
    <section id="professeurs" class="content-section">
        <h2 class="section-title">Liste des Professeurs</h2>
        <div id="professeurs-content">
            <!-- Le contenu sera chargé dynamiquement -->
        </div>
    </section>

    <!-- Liste des étudiants -->
    <section id="etudiants" class="content-section">
        <h2 class="section-title">Liste des Étudiants</h2>
        <div id="etudiants-content">
            <!-- Le contenu sera chargé dynamiquement -->
        </div>
    </section>

    <!-- Liste des classes -->
    <section id="classes" class="content-section">
        <h2 class="section-title">Liste des Classes</h2>
        <div id="classes-content">
            <!-- Le contenu sera chargé dynamiquement -->
        </div>
    </section>
</main>

<footer>
    <div class="footer-content">
        <div class="footer-section">
            <h3>École Excellence</h3>
            <p>Une institution d'enseignement de qualité, dédiée à l'excellence académique et au développement personnel de nos étudiants.</p>
        </div>

        <div class="footer-section">
            <h3>Contact</h3>
            <div class="contact-info">
                <p>📍 123 Avenue de l'Éducation, 75001 Paris</p>
                <p>📞 +33 1 23 45 67 89</p>
                <p>✉️ contact@ecole-excellence.fr</p>
                <p>🌐 www.ecole-excellence.fr</p>
            </div>
        </div>

        <div class="footer-section">
            <h3>Suivez-nous</h3>
            <div class="social-links">
                <a href="#" title="Facebook">📘</a>
                <a href="#" title="Twitter">🐦</a>
                <a href="#" title="Instagram">📷</a>
                <a href="#" title="LinkedIn">💼</a>
                <a href="#" title="YouTube">📺</a>
            </div>
        </div>
    </div>
</footer>

<script>
    function showSection(sectionId) {
        // Masquer toutes les sections
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => section.classList.remove('active'));

        // Afficher la section demandée
        document.getElementById(sectionId).classList.add('active');

        // Charger le contenu si nécessaire
        if (sectionId === 'professeurs') {
            loadProfesseurs();
        } else if (sectionId === 'etudiants') {
            loadEtudiants();
        } else if (sectionId === 'classes') {
            loadClasses();
        }
    }

    function loadProfesseurs() {
        // Simulation de données - en réalité, cela viendrait de la base de données
        const professeurs = [
            {nom: 'Dubois', prenom: 'Marie', email: 'marie.dubois@ecole.fr', matiere: 'Mathématiques', telephone: '01 23 45 67 89'},
            {nom: 'Martin', prenom: 'Pierre', email: 'pierre.martin@ecole.fr', matiere: 'Français', telephone: '01 23 45 67 90'},
            {nom: 'Bernard', prenom: 'Sophie', email: 'sophie.bernard@ecole.fr', matiere: 'Histoire', telephone: '01 23 45 67 91'},
            {nom: 'Petit', prenom: 'Jean', email: 'jean.petit@ecole.fr', matiere: 'Sciences', telephone: '01 23 45 67 92'},
            {nom: 'Moreau', prenom: 'Alice', email: 'alice.moreau@ecole.fr', matiere: 'Anglais', telephone: '01 23 45 67 93'}
        ];

        let html = `
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Matière</th>
                            <th>Téléphone</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

        professeurs.forEach(prof => {
            html += `
                    <tr>
                        <td>${prof.nom}</td>
                        <td>${prof.prenom}</td>
                        <td>${prof.email}</td>
                        <td>${prof.matiere}</td>
                        <td>${prof.telephone}</td>
                    </tr>
                `;
        });

        html += '</tbody></table>';
        document.getElementById('professeurs-content').innerHTML = html;
        document.getElementById('prof-count').textContent = professeurs.length;
    }

    function loadEtudiants() {
        const etudiants = [
            {nom: 'Leblanc', prenom: 'Emma', email: 'emma.leblanc@etudiant.fr', classe: '6ème A', telephone: '01 34 56 78 90'},
            {nom: 'Rousseau', prenom: 'Lucas', email: 'lucas.rousseau@etudiant.fr', classe: '5ème B', telephone: '01 34 56 78 91'},
            {nom: 'Garnier', prenom: 'Chloé', email: 'chloe.garnier@etudiant.fr', classe: '4ème A', telephone: '01 34 56 78 92'},
            {nom: 'Faure', prenom: 'Hugo', email: 'hugo.faure@etudiant.fr', classe: '3ème C', telephone: '01 34 56 78 93'},
            {nom: 'Andre', prenom: 'Léa', email: 'lea.andre@etudiant.fr', classe: '6ème B', telephone: '01 34 56 78 94'},
            {nom: 'Mercier', prenom: 'Nathan', email: 'nathan.mercier@etudiant.fr', classe: '5ème A', telephone: '01 34 56 78 95'},
            {nom: 'Blanc', prenom: 'Manon', email: 'manon.blanc@etudiant.fr', classe: '4ème B', telephone: '01 34 56 78 96'},
            {nom: 'Guerin', prenom: 'Tom', email: 'tom.guerin@etudiant.fr', classe: '3ème A', telephone: '01 34 56 78 97'}
        ];

        let html = `
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Classe</th>
                            <th>Téléphone</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

        etudiants.forEach(etudiant => {
            html += `
                    <tr>
                        <td>${etudiant.nom}</td>
                        <td>${etudiant.prenom}</td>
                        <td>${etudiant.email}</td>
                        <td>${etudiant.classe}</td>
                        <td>${etudiant.telephone}</td>
                    </tr>
                `;
        });

        html += '</tbody></table>';
        document.getElementById('etudiants-content').innerHTML = html;
        document.getElementById('student-count').textContent = etudiants.length;
    }

    function loadClasses() {
        const classes = [
            {nom: '6ème A', niveau: '6ème', capacite: 25, professeur_principal: 'Marie Dubois', nb_etudiants: 23},
            {nom: '6ème B', niveau: '6ème', capacite: 25, professeur_principal: 'Pierre Martin', nb_etudiants: 24},
            {nom: '5ème A', niveau: '5ème', capacite: 28, professeur_principal: 'Sophie Bernard', nb_etudiants: 26},
            {nom: '5ème B', niveau: '5ème', capacite: 28, professeur_principal: 'Jean Petit', nb_etudiants: 27},
            {nom: '4ème A', niveau: '4ème', capacite: 30, professeur_principal: 'Alice Moreau', nb_etudiants: 28},
            {nom: '4ème B', niveau: '4ème', capacite: 30, professeur_principal: 'Marie Dubois', nb_etudiants: 29},
            {nom: '3ème A', niveau: '3ème', capacite: 30, professeur_principal: 'Pierre Martin', nb_etudiants: 25},
            {nom: '3ème C', niveau: '3ème', capacite: 30, professeur_principal: 'Sophie Bernard', nb_etudiants: 28}
        ];

        let html = `
                <table>
                    <thead>
                        <tr>
                            <th>Classe</th>
                            <th>Niveau</th>
                            <th>Professeur Principal</th>
                            <th>Étudiants</th>
                            <th>Capacité</th>
                            <th>Taux de remplissage</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

        classes.forEach(classe => {
            const tauxRemplissage = Math.round((classe.nb_etudiants / classe.capacite) * 100);
            html += `
                    <tr>
                        <td>${classe.nom}</td>
                        <td>${classe.niveau}</td>
                        <td>${classe.professeur_principal}</td>
                        <td>${classe.nb_etudiants}</td>
                        <td>${classe.capacite}</td>
                        <td>${tauxRemplissage}%</td>
                    </tr>
                `;
        });

        html += '</tbody></table>';
        document.getElementById('classes-content').innerHTML = html;
        document.getElementById('class-count').textContent = classes.length;
    }

    // Charger les statistiques au chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        // Simuler le chargement des données pour les statistiques
        setTimeout(() => {
            document.getElementById('prof-count').textContent = '5';
            document.getElementById('student-count').textContent = '8';
            document.getElementById('class-count').textContent = '8';
        }, 500);
    });
</script>
</body>
</html>
