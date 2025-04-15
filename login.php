<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyage des données
    $username = filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
    $username = strip_tags($username ?? '');
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $email = htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8');

    // Vérification des champs
    if (!$username || !$email) {
        $error = "Veuillez remplir tous les champs correctement.";
    } else {
        // Vérifier si l'utilisateur existe dans la base de données
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? AND email = ?");
        $stmt->execute([$username, $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Utilisateur trouvé : enregistrer l'heure de connexion et connecter
            $_SESSION['user_id'] = $user['id'];
            $stmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
            $stmt->execute([$user['id']]);
            header("Location: vote.php");
            exit;
        } else {
            // Utilisateur non trouvé : inviter à s'inscrire
            $error = "Utilisateur non trouvé. <a href='register.php' class='text-purple'>S'inscrire</a>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Concours Miss/Master</title>
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
            <h1 class="text-center fs-2 fw-bold mb-5">Connexion</h1>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="bg-white rounded-xl shadow-md p-4">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-purple w-100">Se connecter</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">
                            Pas de compte ? <a href="register.php" class="text-purple">S'inscrire</a>
                        </p>
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