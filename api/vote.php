<?php
header('Content-Type: application/json');
require '../config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Non connecté.']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Vérifier si l'utilisateur existe et s'il a déjà voté
$stmt = $pdo->prepare("SELECT has_voted FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(['success' => false, 'error' => 'Utilisateur introuvable.']);
    exit;
}

if ($user['has_voted']) {
    echo json_encode(['success' => false, 'error' => 'Vous avez déjà voté.']);
    exit;
}

// Vérifier si le vote est activé
$stmt = $pdo->prepare("SELECT voting_enabled FROM settings WHERE id = 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$settings) {
    echo json_encode(['success' => false, 'error' => 'Paramètres introuvables.']);
    exit;
}

if (!$settings['voting_enabled']) {
    echo json_encode(['success' => false, 'error' => 'Le vote est fermé.']);
    exit;
}

// Récupérer les données du vote
$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['candidate'])) {
    echo json_encode(['success' => false, 'error' => 'Candidat non spécifié.']);
    exit;
}

$candidate = $data['candidate'];
$valid_candidates = ['Miss', 'Master'];

if (!in_array($candidate, $valid_candidates)) {
    echo json_encode(['success' => false, 'error' => 'Candidat invalide.']);
    exit;
}

// Enregistrer le vote
try {
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("INSERT INTO votes (user_id, candidate) VALUES (?, ?)");
    $stmt->execute([$user_id, $candidate]);
    $stmt = $pdo->prepare("UPDATE users SET has_voted = 1 WHERE id = ?");
    $stmt->execute([$user_id]);
    $pdo->commit();
    echo json_encode(['success' => true, 'message' => 'Vote enregistré avec succès !']);
} catch (PDOException $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'enregistrement du vote : ' . $e->getMessage()]);
}
?>