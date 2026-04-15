<?php
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/mailer.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Ongeldige methode.']);
    exit;
}

$required = ['id', 'status'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['success' => false, 'error' => 'Ontbrekende parameter: ' . $field]);
        exit;
    }
}

$id = intval($_POST['id']);
$status = $_POST['status'];
$validStatuses = ['pending', 'confirmed', 'cancelled'];

if (!in_array($status, $validStatuses, true)) {
    echo json_encode(['success' => false, 'error' => 'Ongeldige status.']);
    exit;
}

try {
    // Get booking details before updating
    $getStmt = $pdo->prepare('SELECT name, email, program, date, time FROM bookings WHERE id = ?');
    $getStmt->execute([$id]);
    $booking = $getStmt->fetch(PDO::FETCH_ASSOC);

    if (!$booking) {
        echo json_encode(['success' => false, 'error' => 'Boeking niet gevonden.']);
        exit;
    }

    $stmt = $pdo->prepare('UPDATE bookings SET status = ? WHERE id = ?');
    $stmt->execute([$status, $id]);

    if ($stmt->rowCount() === 0) {
        echo json_encode(['success' => false, 'error' => 'Boeking niet gevonden of status is al hetzelfde.']);
        exit;
    }

    // Send confirmation email if booking is confirmed
    if ($status === 'confirmed') {
        sendConfirmedEmail($booking['email'], $booking['name'], $booking['program'], $booking['date'], $booking['time']);
    }

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database fout: ' . $e->getMessage()]);
}
