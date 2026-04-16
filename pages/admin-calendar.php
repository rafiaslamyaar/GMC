
<?php
include "../includes/header.php";
require_once __DIR__ . "/../includes/db.php";

$blockedDates = [];
$existingBookings = [];

try {
    $stmt = $pdo->query('SELECT blocked_date FROM blocked_dates ORDER BY blocked_date');
    $blockedDates = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $stmt2 = $pdo->query('SELECT id, date, time, status, name, program FROM bookings WHERE status <> "cancelled" ORDER BY date, time');
    $existingBookings = $stmt2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Geef fallback als DB faalt
    $blockedDates = [];
    $existingBookings = [];
}
?>


<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Kalender - Mark Cox Training</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/admin-calendar.css">

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
    
    .blocked-dates-list {
      background-color: #161616;
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 1rem;
      padding: 1.5rem;
      margin-top: 2rem;
      max-height: 300px;
      overflow-y: auto;
    }
    
    .blocked-date-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .blocked-date-item:last-child {
      border-bottom: none;
    }
    
    .remove-btn {
      background-color: rgba(255, 0, 0, 0.2);
      color: #ff6b6b;
      border: 1px solid rgba(255, 0, 0, 0.3);
      padding: 0.4rem 1rem;
      border-radius: 0.5rem;
      font-size: 0.75rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
    }
    
    .remove-btn:hover {
      background-color: rgba(255, 0, 0, 0.3);
    }
  </style>
</head>
<body>



  <!-- PIN Entry -->
  <div id="pinContainer" class="pin-container">
    <div class="card">
      <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">🔒</h2>
      <h1 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 0.5rem;">TRAINERTOEGANG</h1>
      <p style="color: rgba(255, 255, 255, 0.5); margin-bottom: 2rem;">
        Voer je PIN in om ongebruikte datums te beheren
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

  <!-- Admin Panel (Hidden) -->
  <div id="adminPanel" class="admin-container hidden">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 0.75rem;">
      <div>
        <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 0.5rem;">
          ADMIN <span class="highlight">DASHBOARD</span>
        </h1>
        <p style="color: rgba(255, 255, 255, 0.5);">
          Blokkeer datums wanneer je niet beschikbaar bent
        </p>
      </div>
      
    </div>
    
    <!-- Calendar -->
    <div class="calendar">
      <div class="calendar-header">
        <button class="calendar-nav-btn" onclick="previousMonth()">‹</button>
        <div class="calendar-title" id="monthTitle">januari 2026</div>
        <button class="calendar-nav-btn" onclick="nextMonth()">›</button>
      </div>
      
      <div class="calendar-weekdays">
        <div class="calendar-weekday">Ma</div>
        <div class="calendar-weekday">Di</div>
        <div class="calendar-weekday">Wo</div>
        <div class="calendar-weekday">Do</div>
        <div class="calendar-weekday">Vr</div>
        <div class="calendar-weekday">Za</div>
        <div class="calendar-weekday">Zo</div>
      </div>
      
      <div class="calendar-days" id="calendarDays"></div>
      
      <div style="display: flex; gap: 1.5rem; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid rgba(255, 255, 255, 0.1);">
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <div style="width: 12px; height: 12px; background-color: rgba(139, 0, 0, 0.5); border-radius: 4px;"></div>
          <span style="color: rgba(255, 255, 255, 0.5); font-size: 0.72rem;">Geblokkeerd</span>
        </div>
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <div style="width: 12px; height: 12px; background-color: #e8580a; border-radius: 4px;"></div>
          <span style="color: rgba(255, 255, 255, 0.5); font-size: 0.72rem;">Geselecteerd</span>
        </div>
      </div>
    </div>
    
    <!-- Blocked Dates List -->
    <div class="blocked-dates-list">
      <h3 style="font-weight: 700; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
        <span>Geblokkeerde datums (<span id="blockedCount">0</span>)</span>
      </h3>
      <div id="blockedDatesList">
        <p style="text-align: center; color: rgba(255, 255, 255, 0.3); padding: 2rem 0;">
          Nog geen geblokkeerde datums. Klik in de kalender om een datum te blokkeren.
        </p>
      </div>
    </div>

    <div class="blocked-dates-list" style="margin-top: 2rem;">
      <h3 style="font-weight: 700; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
        <span>Boekingen</span>
      </h3>
      <div id="bookingsList">
        <p style="text-align: center; color: rgba(255, 255, 255, 0.3); padding: 2rem 0;">
          Log in om de boekingen te beheren.
        </p>
      </div>
    </div>
  </div>

 

  <script>
    // Pass PHP data to JavaScript
    window.DB_BLOCKED_DATES = new Set(<?= json_encode($blockedDates) ?>);
    window.DB_BOOKINGS = <?= json_encode($existingBookings) ?>;
  </script>
  <script src="../js/main.js"></script>
  <script src="../js/admin-calendar.js"></script>
