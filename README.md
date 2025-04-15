# Plateforme de gestion de votes - Concours Miss/Master

## Description
Site web pour gérer les votes de la finale du concours Miss/Master à l'Université Paris Santé Campus de Bastos. Les utilisateurs peuvent voter une fois pour un finaliste après authentification. L'administrateur peut bloquer le vote et consulter les statistiques.

## Prérequis
- Serveur PHP 8.x (XAMPP/WAMP recommandé)
- MySQL
- Navigateur moderne

## Installation
1. Copiez le dossier `/vote-platform/` dans `htdocs` (XAMPP) ou équivalent.
2. Importez `database.sql` dans MySQL pour créer la base `vote_platform`.
3. Modifiez `config.php` pour les identifiants MySQL si nécessaire.
4. Accédez via `http://localhost/vote-platform/`.

## Utilisation
- **Page d'accueil** : Présente les finalistes et redirige vers la connexion.
- **Connexion/Inscription** : Utilisez un email et un nom d'utilisateur uniques.
- **Vote** : Choisissez un finaliste et confirmez (un seul vote par utilisateur).
- **Admin** : Connectez-vous avec `admin` / `admin123` pour voir les stats et activer/désactiver le vote.

## Structure
- `index.php` : Page d'accueil.
- `login.php` : Authentification.
- `vote.php` : Page de vote.
- `admin.php` : Tableau de bord admin.
- `api/` : Endpoints pour AJAX.
- `css/styles.css` : Styles personnalisés.
- `js/script.js` : Interactions frontend.
- `database.sql` : Script de la base de données.

## Palette de couleurs
- Zaffre : #27179B
- Phthalo Blue : #221483
- Zaffre 2 : #2715A5
- Navy Blue : #160D75
- Black : #000000

## Sécurité
- Requêtes PDO pour éviter les injections SQL.
- Hachage des mots de passe admin.
- Validation des entrées utilisateur.