<?php
require 'config.php';

// Gestion de la soumission du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['admin'])) {
    // Nettoyage des données sans FILTER_SANITIZE_STRING
    $username = filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
    $username = strip_tags($username ?? '');
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    $password = strip_tags($password ?? '');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    if (!$username || !$password) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        $stmt = $pdo->prepare("SELECT password FROM admin WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Comparaison directe du mot de passe (sans hachage)
        if ($admin && $password === $admin['password']) {
            $_SESSION['admin'] = true;
        } else {
            $error = "Identifiants incorrects.";
        }
    }
}

// Si l'admin n'est pas connecté, afficher le formulaire de connexion
if (!isset($_SESSION['admin'])) :
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="min-vh-100 d-flex flex-column">
    <!-- Header -->
    <header class="border-bottom bg-white sticky-top z-10">
        <div class="container mx-auto px-4 py-3 d-flex align-items-center justify-content-between">
            <a href="index.php" class="d-flex align-items-center gap-2 text-decoration-none">
                <span class="crown-icon">👑</span>
                <span class="fw-bold fs-4">Concours Miss/Master</span>
            </a>
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <nav class="d-flex align-items-center gap-4 ms-auto flex-column flex-md-row pt-3 pt-md-0">
                    <a href="index.php#fonctionnalites" class="text-sm font-medium text-dark hover-text-purple transition-colors">Fonctionnalités</a>
                    <a href="index.php#candidats" class="text-sm font-medium text-dark hover-text-purple transition-colors">Candidats</a>
                    <a href="index.php#comment-voter" class="text-sm font-medium text-dark hover-text-purple transition-colors">Comment Voter</a>
                    <a href="index.php#contact" class="text-sm font-medium text-dark hover-text-purple transition-colors">Contact</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1 py-5 bg-gray-light">
        <div class="container mx-auto px-4">
            <h1 class="text-center fs-2 fw-bold mb-5">Connexion Admin</h1>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="bg-white rounded-xl shadow-md p-4">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-medium">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-purple w-100">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer id="contact" class="bg-dark text-gray-light">
        <div class="container mx-auto px-4 py-5">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="crown-icon">👑</span>
                        <span class="fw-bold fs-4 text-white">Concours Miss/Master</span>
                    </div>
                    <p class="text-sm text-gray-light">
                        La plateforme de référence pour l'organisation de concours de beauté et de talent.
                    </p>
                </div>
                <div class="col">
                    <h3 class="fw-bold text-white mb-3">Liens Rapides</h3>
                    <ul class="list-unstyled space-y-2">
                        <li><a href="index.php" class="text-sm text-gray-light hover-text-purple transition-colors">Accueil</a></li>
                        <li><a href="index.php#fonctionnalites" class="text-sm text-gray-light hover-text-purple transition-colors">Fonctionnalités</a></li>
                        <li><a href="index.php#candidats" class="text-sm text-gray-light hover-text-purple transition-colors">Candidats</a></li>
                        <li><a href="index.php#comment-voter" class="text-sm text-gray-light hover-text-purple transition-colors">Comment Voter</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3 class="fw-bold text-white mb-3">Légal</h3>
                    <ul class="list-unstyled space-y-2">
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Conditions d'utilisation</a></li>
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Mentions légales</a></li>
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Cookies</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3 class="fw-bold text-white mb-3">Contact</h3>
                    <ul class="list-unstyled space-y-2">
                        <li class="text-sm">contact@concoursmissmaster.com</li>
                        <li class="text-sm">+33 1 23 45 67 89</li>
                        <li class="text-sm">123 Avenue des Concours, Paris</li>
                    </ul>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="text-gray-light hover-text-white transition-colors">Facebook</a>
                        <a href="#" class="text-gray-light hover-text-white transition-colors">Instagram</a>
                        <a href="#" class="text-gray-light hover-text-white transition-colors">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="border-top border-dark mt-5 pt-4 text-center">
                <p class="text-sm text-gray-light">
                    © 2025 Concours Miss/Master. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<?php else : ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tableau de bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="min-vh-100 d-flex flex-column">
    <!-- Header -->
    <header class="border-bottom bg-white sticky-top z-10">
        <div class="container mx-auto px-4 py-3 d-flex align-items-center justify-content-between">
            <a href="index.php" class="d-flex align-items-center gap-2 text-decoration-none">
                <span class="crown-icon">👑</span>
                <span class="fw-bold fs-4">Concours Miss/Master</span>
            </a>
            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <nav class="d-flex align-items-center gap-4 ms-auto flex-column flex-md-row pt-3 pt-md-0">
                    <a href="index.php#fonctionnalites" class="text-sm font-medium text-dark hover-text-purple transition-colors">Fonctionnalités</a>
                    <a href="index.php#candidats" class="text-sm font-medium text-dark hover-text-purple transition-colors">Candidats</a>
                    <a href="index.php#comment-voter" class="text-sm font-medium text-dark hover-text-purple transition-colors">Comment Voter</a>
                    <a href="index.php#contact" class="text-sm font-medium text-dark hover-text-purple transition-colors">Contact</a>
                    <a href="logout.php" class="btn btn-outline-dark d-block d-md-inline-block">Déconnexion</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1 py-5 bg-gray-light">
        <div class="container mx-auto px-4">
            <h1 class="text-center fs-2 fw-bold mb-5">Tableau de bord Admin</h1>

            <!-- Message de confirmation -->
            <div id="toggle-message" class="d-none alert text-center max-w-3xl mx-auto"></div>

            <!-- Statistiques des votes -->
            <div id="stats" class="bg-white rounded-xl shadow-md p-4 mb-4 max-w-3xl mx-auto">
                <h3 class="fs-4 fw-bold mb-3">Statistiques des votes</h3>
                <p>Votes pour Miss : <span id="miss-votes">0</span></p>
                <p>Votes pour Master : <span id="master-votes">0</span></p>
                <p>Total : <span id="total-votes">0</span></p>
            </div>

            <!-- Suivi des utilisateurs -->
            <div id="users" class="bg-white rounded-xl shadow-md p-4 mb-4 max-w-3xl mx-auto">
                <h3 class="fs-4 fw-bold mb-3">Utilisateurs récents</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Dernière connexion</th>
                        </tr>
                    </thead>
                    <tbody id="users-list"></tbody>
                </table>
            </div>

            <!-- Contrôle des votes -->
            <div class="text-center">
                <button id="toggleVote" class="btn btn-purple">Désactiver le vote</button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer id="contact" class="bg-dark text-gray-light">
        <div class="container mx-auto px-4 py-5">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="crown-icon">👑</span>
                        <span class="fw-bold fs-4 text-white">Concours Miss/Master</span>
                    </div>
                    <p class="text-sm text-gray-light">
                        La plateforme de référence pour l'organisation de concours de beauté et de talent.
                    </p>
                </div>
                <div class="col">
                    <h3 class="fw-bold text-white mb-3">Liens Rapides</h3>
                    <ul class="list-unstyled space-y-2">
                        <li><a href="index.php" class="text-sm text-gray-light hover-text-purple transition-colors">Accueil</a></li>
                        <li><a href="index.php#fonctionnalites" class="text-sm text-gray-light hover-text-purple transition-colors">Fonctionnalités</a></li>
                        <li><a href="index.php#candidats" class="text-sm text-gray-light hover-text-purple transition-colors">Candidats</a></li>
                        <li><a href="index.php#comment-voter" class="text-sm text-gray-light hover-text-purple transition-colors">Comment Voter</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3 class="fw-bold text-white mb-3">Légal</h3>
                    <ul class="list-unstyled space-y-2">
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Conditions d'utilisation</a></li>
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Mentions légales</a></li>
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Cookies</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3 class="fw-bold text-white mb-3">Contact</h3>
                    <ul class="list-unstyled space-y-2">
                        <li class="text-sm">contact@concoursmissmaster.com</li>
                        <li class="text-sm">+33 1 23 45 67 89</li>
                        <li class="text-sm">123 Avenue des Concours, Paris</li>
                    </ul>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="text-gray-light hover-text-white transition-colors">Facebook</a>
                        <a href="#" class="text-gray-light hover-text-white transition-colors">Instagram</a>
                        <a href="#" class="text-gray-light hover-text-white transition-colors">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="border-top border-dark mt-5 pt-4 text-center">
                <p class="text-sm text-gray-light">
                    © 2025 Concours Miss/Master. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<?php endif; ?>