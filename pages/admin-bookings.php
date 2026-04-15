<?php
include "../includes/header.php";
require_once __DIR__ . "/../includes/db.php";

$existingBookings = [];

try {
    $stmt = $pdo->query('SELECT id, date, time, status, name, program, email, phone, notes FROM bookings WHERE status <> "cancelled" ORDER BY date, time');
    $existingBookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $existingBookings = [];
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Boekingen - Mark Cox Training</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <style>
    .admin-container {
      max-width: 900px;
      margin: 0 auto;
      padding: 3rem 1.5rem;
      min-height: 80vh;
    }

    .pin-container {
      max-width: 400px;
      margin: 8rem auto;
      text-align: center;
    }

    .pin-input {
      width: 100%;
      text-align: center;
      font-size: 1.5rem;
      letter-spacing: 0.5rem;
      padding: 1rem;
      margin: 1.5rem 0;
    }

    .booking-card {
      background-color: #161616;
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 1rem;
      padding: 1.5rem;
      margin-bottom: 1rem;
    }

    .booking-card + .booking-card {
      margin-top: 1rem;
    }

    .booking-actions {
      display: flex;
      gap: 0.75rem;
      flex-wrap: wrap;
      margin-top: 0.75rem;
    }

    .booking-meta {
      color: rgba(255, 255, 255, 0.7);
      font-size: 0.9rem;
      margin-top: 0.5rem;
    }

    .booking-status {
      color: rgba(255, 255, 255, 0.9);
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }

    .bookings-empty {
      text-align: center;
      color: rgba(255, 255, 255, 0.4);
      padding: 2rem 0;
    }

    .admin-header-actions {
      display: flex;
      gap: 0.75rem;
      flex-wrap: wrap;
      margin-top: 1rem;
    }
  </style>
</head>
<body>

  <div id="pinContainer" class="pin-container">
    <div class="card">
      <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">🔒</h2>
      <h1 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 0.5rem;">TRAINERTOEGANG</h1>
      <p style="color: rgba(255, 255, 255, 0.5); margin-bottom: 2rem;">
        Voer je PIN in om alle boekingen te bekijken en te beheren
      </p>
      <input 
        type="password"
        id="pinInput"
        class="form-input pin-input"
        maxlength="4"
        placeholder="••••"
        onkeypress="handlePinEnter(event)"
      >
      <button onclick="checkPin()" class="btn btn-primary" style="width: 100%;">
        ONTGRENDELEN
      </button>
      <p style="color: rgba(255, 255, 255, 0.3); font-size: 0.75rem; margin-top: 1.5rem;">
        Demo PIN: 1234
      </p>
    </div>
  </div>

  <div id="adminPanel" class="admin-container hidden">
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
      <div>
        <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 0.5rem;">ADMIN <span class="highlight">BOEKINGEN</span></h1>
        <p style="color: rgba(255, 255, 255, 0.5);">Bekijk alle boekingen en accepteer of annuleer ze vanaf deze pagina.</p>
      </div>
      <div class="admin-header-actions">
        <a href="admin-calendar.php" class="btn btn-secondary" style="padding: 0.75rem 1.5rem; display: inline-flex; align-items: center; justify-content: center;">Kalender</a>
        <button onclick="logout()" class="btn btn-secondary" style="padding: 0.75rem 1.5rem;">UITLOGGEN</button>
      </div>
    </div>

    <div id="bookingsList"></div>
  </div>

  <script>
    // Pass PHP data to JavaScript
    window.DB_BOOKINGS = <?= json_encode($existingBookings) ?>;
  </script>
  <script src="../js/main.js"></script>
  <script src="../js/admin-bookings.js"></script>
</body>
</html>
<?php
include '../includes/footer.php';
?>