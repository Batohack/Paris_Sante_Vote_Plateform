<?php
header('Content-Type: application/json');
require '../config.php';

if (!isset($_SESSION['admin'])) {
    echo json_encode(['success' => false, 'error' => 'Non autorisé']);
    exit;
}

// Récupérer les utilisateurs avec leur dernière connexion
$stmt = $pdo->prepare("SELECT username, last_login FROM users ORDER BY last_login DESC LIMIT 10");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    'success' => true,
    'users' => $users
]);
?>