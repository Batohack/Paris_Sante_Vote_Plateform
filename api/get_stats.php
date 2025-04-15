<?php
header('Content-Type: application/json');
require '../config.php';

if (!isset($_SESSION['admin'])) {
    echo json_encode(['success' => false, 'error' => 'Non autorisé']);
    exit;
}

$miss_votes = $pdo->query("SELECT COUNT(*) FROM votes WHERE candidate = 'Miss'")->fetchColumn();
$master_votes = $pdo->query("SELECT COUNT(*) FROM votes WHERE candidate = 'Master'")->fetchColumn();
$total_votes = $miss_votes + $master_votes;

echo json_encode([
    'success' => true,
    'miss_votes' => $miss_votes,
    'master_votes' => $master_votes,
    'total_votes' => $total_votes
]);
?>