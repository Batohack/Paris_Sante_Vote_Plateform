<?php
header('Content-Type: application/json');
require '../config.php';

if (!isset($_SESSION['admin'])) {
    echo json_encode(['success' => false, 'error' => 'Non autorisé']);
    exit;
}

// Récupérer l'état actuel du vote
$stmt = $pdo->prepare("SELECT voting_enabled FROM settings WHERE id = 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$settings) {
    echo json_encode(['success' => false, 'error' => 'Paramètres introuvables']);
    exit;
}

$new_state = !$settings['voting_enabled']; // Inverser l'état
$stmt = $pdo->prepare("UPDATE settings SET voting_enabled = ? WHERE id = 1");
$stmt->execute([$new_state]);

echo json_encode([
    'success' => true,
    'voting_enabled' => $new_state,
    'message' => $new_state ? 'Vote activé' : 'Vote désactivé'
]);
?>