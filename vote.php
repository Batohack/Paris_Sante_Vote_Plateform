<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT has_voted FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$voting_enabled = $pdo->query("SELECT voting_enabled FROM settings WHERE id = 1")->fetch()['voting_enabled'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter - Concours Miss/Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="min-vh-100 d-flex flex-column">
    <!-- Header -->
    <header class="border-bottom bg-white sticky-top z-10">
        <div class="container mx-auto px-4 py-3 d-flex align-items-center justify-content-between">
            <a href="/" class="d-flex align-items-center gap-2 text-decoration-none">
                <span class="crown-icon">👑</span>
                <span class="fw-bold fs-4">Concours Miss/Master</span>
            </a>
            <nav class="d-none d-md-flex align-items-center gap-4">
                <a href="index.php#fonctionnalites" class="text-sm font-medium text-dark hover-text-purple transition-colors">Fonctionnalités</a>
                <a href="index.php#candidats" class="text-sm font-medium text-dark hover-text-purple transition-colors">Candidats</a>
                <a href="index.php#comment-voter" class="text-sm font-medium text-dark hover-text-purple transition-colors">Comment Voter</a>
                <a href="index.php#contact" class="text-sm font-medium text-dark hover-text-purple transition-colors">Contact</a>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <a href="logout.php" class="btn btn-outline-dark d-none d-sm-flex">Déconnexion</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1 py-5 bg-gray-light">
        <div class="container mx-auto px-4">
            <h1 class="text-center fs-2 fw-bold mb-5">Voter pour votre favori</h1>

            <?php if ($user['has_voted']) : ?>
                <div class="alert alert-info text-center max-w-3xl mx-auto">
                    Vous avez déjà voté.
                </div>
            <?php elseif (!$voting_enabled) : ?>
                <div class="alert alert-warning text-center max-w-3xl mx-auto">
                    Le vote est actuellement fermé.
                </div>
            <?php else : ?>
                <div id="vote-message" class="d-none alert text-center max-w-3xl mx-auto"></div>
                <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
                    <div class="col">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md transition-transform hover-scale">
                            <div class="position-relative h-80">
                                <img src="./img/Djamen.png" alt="Miss" class="object-fit-cover w-100 h-100">
                                <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-to-t from-purple-dark to-transparent p-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="star-icon text-yellow">⭐</span>
                                        <span class="text-white fw-medium">Finaliste</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 text-center">
                                <h3 class="fw-bold fs-4 mb-2">Djamen Ngamen Mégane Karla</h3>
                                <p class="text-gray text-sm mb-3">Finaliste féminine</p>
                                <button class="btn btn-purple vote-btn" data-candidate="Miss">Voter pour Mégane</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md transition-transform hover-scale">
                            <div class="position-relative h-80">
                                <img src="img/5ccfcf25-e36e-4821-800c-36b5f743e116.jpg" alt="Master" class="object-fit-cover w-100 h-100">
                                <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-to-t from-purple-dark to-transparent p-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="star-icon text-yellow">⭐</span>
                                        <span class="text-white fw-medium">Finaliste Master</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 text-center">
                                <h3 class="fw-bold fs-4 mb-2">Master</h3>
                                <p class="text-gray text-sm mb-3">Finaliste masculin</p>
                                <button class="btn btn-purple vote-btn" data-candidate="Master">Voter pour Master</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
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