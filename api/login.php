<?php
header('Content-Type: application/json');
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? AND email = ?");
    $stmt->execute([$username, $email]);
    if ($stmt->fetch()) {
        $_SESSION['user_id'] = $pdo->lastInsertId();
        echo json_encode(['success' => true]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
        if ($stmt->execute([$username, $email])) {
            $_SESSION['user_id'] = $pdo->lastInsertId();
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Erreur d\'inscription.']);
        }
    }
}
?>