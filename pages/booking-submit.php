<?php
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Alleen POST toegestaan']);
    exit;
}

require_once __DIR__ . '/../includes/db.php';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$program = trim($_POST['program'] ?? '');
$notes = trim($_POST['notes'] ?? '');
$date = trim($_POST['date'] ?? '');
$time = trim($_POST['time'] ?? '');

if (!$name || !$email || !$program || !$date || !$time) {
    http_response_code(400);
    echo json_encode(['error' => 'Vul alle verplichte velden in']);
    exit;
}

try {
    $blockedStmt = $pdo->prepare('SELECT 1 FROM blocked_dates WHERE blocked_date = ?');
    $blockedStmt->execute([$date]);
    if ($blockedStmt->fetchColumn()) {
        http_response_code(409);
        echo json_encode(['error' => 'Deze datum is niet beschikbaar (geblokkeerd)']);
        exit;
    }

    $bookingStmt = $pdo->prepare('SELECT 1 FROM bookings WHERE date = ? AND time = ? AND status <> "cancelled"');
    $bookingStmt->execute([$date, $time]);
    if ($bookingStmt->fetchColumn()) {
        http_response_code(409);
        echo json_encode(['error' => 'Deze tijd is al gereserveerd']);
        exit;
    }

    $insertStmt = $pdo->prepare('INSERT INTO bookings (name, email, phone, program, notes, date, time, status) VALUES (?, ?, ?, ?, ?, ?, ?, "pending")');
    $insertStmt->execute([$name, $email, $phone, $program, $notes, $date, $time]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Serverfout: ' . $e->getMessage()]);
    exit;
}
