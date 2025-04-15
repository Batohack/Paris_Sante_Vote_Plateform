<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours Miss/Master - Paris Santé Campus</title>
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
                <a href="#fonctionnalites" class="text-sm font-medium text-dark hover-text-purple transition-colors">Fonctionnalités</a>
                <a href="#candidats" class="text-sm font-medium text-dark hover-text-purple transition-colors">Candidats</a>
                <a href="#comment-voter" class="text-sm font-medium text-dark hover-text-purple transition-colors">Comment Voter</a>
                <a href="#contact" class="text-sm font-medium text-dark hover-text-purple transition-colors">Contact</a>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <a href="login.php" class="btn btn-outline-dark d-none d-sm-flex">Se Connecter</a>
                <a href="login.php" class="btn btn-purple">S'inscrire</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1">
        <!-- Hero Section -->
        <section class="position-relative bg-hero-gradient text-white">
            <div class="position-absolute inset-0 opacity-20 bg-hero-image"></div>
            <div class="container mx-auto px-4 py-20 md-py-32 position-relative z-10">
                <div class="max-w-3xl">
                    <h1 class="fs-1 fw-bold mb-4">
                        Élisez votre <span class="text-yellow">Miss</span> et <span class="text-yellow">Master</span> préférés
                    </h1>
                    <p class="fs-5 mb-5 text-purple-light">
                        Une plateforme moderne et sécurisée pour gérer les votes de votre concours d'élégance et de talent.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a href="login.php" class="btn btn-yellow btn-lg fw-bold">Commencer à Voter</a>
                        <a href="#fonctionnalites" class="btn btn-outline-white btn-lg">En Savoir Plus</a>
                    </div>
                </div>
            </div>
            <div class="position-absolute bottom-0 start-0 end-0 h-16 bg-fade-to-white"></div>
        </section>

        <!-- Features Section -->
        <section id="fonctionnalites" class="py-5 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-5">
                    <h2 class="fs-2 fw-bold mb-3">Fonctionnalités Principales</h2>
                    <p class="text-gray max-w-2xl mx-auto">
                        Notre plateforme offre tout ce dont vous avez besoin pour organiser un concours équitable et transparent.
                    </p>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="bg-purple-light p-4 rounded-xl border border-purple-border">
                            <div class="bg-purple-icon w-12 h-12 rounded-lg d-flex align-items-center justify-content-center mb-3">
                                <span class="vote-icon">🗳️</span>
                            </div>
                            <h3 class="fs-4 fw-bold mb-2">Votes Sécurisés</h3>
                            <p class="text-gray">
                                Système de vote crypté et sécurisé pour garantir l'intégrité des résultats du concours.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-purple-light p-4 rounded-xl border border-purple-border">
                            <div class="bg-purple-icon w-12 h-12 rounded-lg d-flex align-items-center justify-content-center mb-3">
                                <span class="users-icon">👥</span>
                            </div>
                            <h3 class="fs-4 fw-bold mb-2">Gestion des Candidats</h3>
                            <p class="text-gray">
                                Créez et gérez facilement les profils des candidats avec photos, biographies et informations.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-purple-light p-4 rounded-xl border border-purple-border">
                            <div class="bg-purple-icon w-12 h-12 rounded-lg d-flex align-items-center justify-content-center mb-3">
                                <span class="trophy-icon">🏆</span>
                            </div>
                            <h3 class="fs-4 fw-bold mb-2">Résultats en Temps Réel</h3>
                            <p class="text-gray">
                                Suivez l'évolution des votes en temps réel avec des graphiques et statistiques détaillés.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Candidates Section -->
        <section id="candidats" class="py-5 bg-gray-light">
            <div class="container mx-auto px-4">
                <div class="text-center mb-5">
                    <h2 class="fs-2 fw-bold mb-3">Nos Candidats</h2>
                    <p class="text-gray max-w-2xl mx-auto">
                        Découvrez les talentueux participants qui concourent pour les titres de Miss et Master.
                    </p>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
                    <div class="col">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md transition-transform hover-scale">
                            <div class="position-relative h-80">
                                <img src="/img/109b7736-dac1-4dff-b3f7-bf9b2341147b.jpg" alt="Miss 1" class="object-fit-cover w-100 h-100">
                                <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-to-t from-purple-dark to-transparent p-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="star-icon text-yellow">⭐</span>
                                        <span class="text-white fw-medium">Candidate #1</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="fw-bold fs-5 mb-1">test1</h3>
                                <p class="text-gray text-sm mb-2">24 ans, Paris</p>
                                <a href="login.php" class="btn btn-outline-dark w-100">Voir Profil</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md transition-transform hover-scale">
                            <div class="position-relative h-80">
                                <img src="https://via.placeholder.com/300x400?text=Miss+2" alt="Miss 2" class="object-fit-cover w-100 h-100">
                                <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-to-t from-purple-dark to-transparent p-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="star-icon text-yellow">⭐</span>
                                        <span class="text-white fw-medium">Candidate #2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="fw-bold fs-5 mb-1">Miss Candidate 2</h3>
                                <p class="text-gray text-sm mb-2">24 ans, Paris</p>
                                <a href="login.php" class="btn btn-outline-dark w-100">Voir Profil</a>
                            </div>
                        </div>
                    </div> -->
                    <div class="col">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md transition-transform hover-scale">
                            <div class="position-relative h-80">
                                <img src="./img/5b115382-bda5-439b-813f-646c1dafe4c8.jpg" alt="Master 1" class="object-fit-cover w-100 h-100">
                                <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-to-t from-purple-dark to-transparent p-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="star-icon text-yellow">⭐</span>
                                        <span class="text-white fw-medium">Candidate #2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="fw-bold fs-5 mb-1">test2</h3>
                                <p class="text-gray text-sm mb-2">26 ans, Lyon</p>
                                <a href="login.php" class="btn btn-outline-dark w-100">Voir Profil</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md transition-transform hover-scale">
                            <div class="position-relative h-80">
                                <img src="https://via.placeholder.com/300x400?text=Master+2" alt="Master 2" class="object-fit-cover w-100 h-100">
                                <div class="position-absolute bottom-0 start-0 end-0 bg-gradient-to-t from-purple-dark to-transparent p-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="star-icon text-yellow">⭐</span>
                                        <span class="text-white fw-medium">Candidate #2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="fw-bold fs-5 mb-1">Master Candidate 2</h3>
                                <p class="text-gray text-sm mb-2">26 ans, Lyon</p>
                                <a href="login.php" class="btn btn-outline-dark w-100">Voir Profil</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="mt-5 text-center">
                    <a href="login.php" class="btn btn-purple">Voir Tous les Candidats</a>
                </div>
            </div>
        </section>

        <!-- How to Vote Section -->
        <section id="comment-voter" class="py-5 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-5">
                    <h2 class="fs-2 fw-bold mb-3">Comment Voter</h2>
                    <p class="text-gray max-w-2xl mx-auto">
                        Suivez ces étapes simples pour soutenir votre candidat préféré.
                    </p>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col text-center">
                        <div class="bg-purple-icon w-16 h-16 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <span class="fs-3 fw-bold text-purple">1</span>
                        </div>
                        <h3 class="fs-4 fw-bold mb-2">Créez un Compte</h3>
                        <p class="text-gray">
                            Inscrivez-vous gratuitement sur notre plateforme pour accéder au système de vote.
                        </p>
                    </div>
                    <div class="col text-center">
                        <div class="bg-purple-icon w-16 h-16 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <span class="fs-3 fw-bold text-purple">2</span>
                        </div>
                        <h3 class="fs-4 fw-bold mb-2">Parcourez les Candidats</h3>
                        <p class="text-gray">
                            Explorez les profils des candidats pour faire votre choix en toute connaissance.
                        </p>
                    </div>
                    <div class="col text-center">
                        <div class="bg-purple-icon w-16 h-16 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
                            <span class="fs-3 fw-bold text-purple">3</span>
                        </div>
                        <h3 class="fs-4 fw-bold mb-2">Votez pour vos Favoris</h3>
                        <p class="text-gray">
                            Soumettez votre vote et suivez les résultats en temps réel sur notre tableau de bord.
                        </p>
                    </div>
                </div>
                <div class="mt-5 p-4 bg-purple-light rounded-xl border border-purple-border max-w-3xl mx-auto">
                    <h3 class="fs-4 fw-bold mb-3 text-center">Dates Importantes</h3>
                    <div class="row row-cols-1 row-cols-sm-2 g-3">
                        <div class="col">
                            <div class="p-3 bg-white rounded-lg">
                                <p class="fw-bold text-purple">Ouverture des Votes</p>
                                <p class="text-gray">15 Avril 2025 - 17:00</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white rounded-lg">
                                <p class="fw-bold text-purple">Clôture des Votes</p>
                                <p class="text-gray">15 Avril 2025 - 23:59</p>
                            </div>
                        </div>
                        <!-- <div class="col">
                            <div class="p-3 bg-white rounded-lg">
                                <p class="fw-bold text-purple">Annonce des Finalistes</p>
                                <p class="text-gray">5 Juin 2025 - 18:00</p>
                            </div>
                        </div> -->
                        <div class="col">
                            <div class="p-3 bg-white rounded-lg">
                                <p class="fw-bold text-purple">Cérémonie de Couronnement</p>
                                <p class="text-gray">15 Juin 2025 - 20:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5 bg-hero-gradient text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="fs-2 fw-bold mb-4">Prêt à Participer au Concours?</h2>
                <p class="fs-5 text-purple-light max-w-2xl mx-auto mb-4">
                    Rejoignez-nous pour célébrer la beauté, le talent et l'élégance. Votre vote compte!
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="login.php" class="btn btn-yellow btn-lg fw-bold">Commencer à Voter</a>
                    <a href="login.php" class="btn btn-outline-white btn-lg">Inscrire un Candidat</a>
                </div>
            </div>
        </section>
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
                        <li><a href="#" class="text-sm text-gray-light hover-text-purple transition-colors">Accueil</a></li>
                        <li><a href="#fonctionnalites" class="text-sm text-gray-light hover-text-purple transition-colors">Fonctionnalités</a></li>
                        <li><a href="#candidats" class="text-sm text-gray-light hover-text-purple transition-colors">Candidats</a></li>
                        <li><a href="#comment-voter" class="text-sm text-gray-light hover-text-purple transition-colors">Comment Voter</a></li>
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