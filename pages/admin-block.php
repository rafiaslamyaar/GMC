<?php
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Alleen POST toegestaan']);
    exit;
}

require_once __DIR__ . '/../includes/db.php';

$date = trim($_POST['date'] ?? '');
$action = trim($_POST['action'] ?? '');

if (!$date || !in_array($action, ['block', 'unblock'], true)) {
    http_response_code(400);
    echo json_encode(['error' => 'Ongeldige parameters']);
    exit;
}

try {
    if ($action === 'block') {
        $stmt = $pdo->prepare('INSERT IGNORE INTO blocked_dates (blocked_date) VALUES (?)');
        $stmt->execute([$date]);
        echo json_encode(['success' => true, 'blocked' => true]);
    } else {
        $stmt = $pdo->prepare('DELETE FROM blocked_dates WHERE blocked_date = ?');
        $stmt->execute([$date]);
        echo json_encode(['success' => true, 'blocked' => false]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Serverfout: ' . $e->getMessage()]);
}
