<?php
include "../includes/header.php";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainingsprogramma's - Mark Cox Training</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <style>
    .program-card {
      background-color: #161616;
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 1rem;
      padding: 2rem;
      transition: all 0.3s;
      height: 100%;
    }
    
    .program-card:hover {
      border-color: rgba(232, 88, 10, 0.3);
      transform: translateY(-4px);
    }
    
    .price-tag {
      display: inline-block;
      background-color: rgba(232, 88, 10, 0.2);
      border: 1px solid rgba(232, 88, 10, 0.3);
      color: #e8580a;
      padding: 0.5rem 1.25rem;
      border-radius: 999px;
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
    }
    
    .features-list {
      list-style: none;
      margin: 1.5rem 0;
    }
    
    .features-list li {
      padding: 0.75rem 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      color: rgba(255, 255, 255, 0.7);
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .features-list li:last-child {
      border-bottom: none;
    }
    
    .features-list li::before {
      content: '✓';
      color: #e8580a;
      font-weight: 700;
      font-size: 1.1rem;
    }
    .ontwerp {
      font-size: clamp(2rem, 5vw, 3rem);
      font-weight: 800;
      margin: 4rem 0 2rem;
      text-align: center;
    }
  </style>
</head>
<body>
 
  <section style="padding: 8rem 0 4rem; background-color: #111111; margin-top: 72px;">
    <div class="container">
      <div class="hero-label">
        <span>Wat ik aanbied</span>
      </div>
      <h1 style="font-size: clamp(2.2rem, 5vw, 3.8rem); font-weight: 800; margin-bottom: 1rem;">
        TRAINING<br>
        <span class="highlight">PROGRAMMA'S</span>
      </h1>
      <p style="color: rgba(255, 255, 255, 0.5); max-width: 700px; font-size: 1.05rem; line-height: 1.7;">
        Kies het programma dat bij jouw doelen en levensstijl past. Alle pakketten bevatten gepersonaliseerde
        trainingsschema's, voortgangscontrole en doorlopende ondersteuning.
      </p>
    </div>
  </section>


  <h1 class="ontwerp">Personal of duo training in studio</h1>  <p style="color: rgba(255, 255, 255, 0.6); text-align: center; margin-bottom: 3rem; max-width: 800px; margin-left: auto; margin-right: auto;">
    Persoonlijke trainingssessies volledig afgestemd op jouw doelen, niveau en agenda. Werk één-op-één of samen met een partner
    in een professionele studio-omgeving voor optimale resultaten.
  </p>
  <!-- Programs -->
  <section style="background-color: #0c0c0c;">
    <div class="container">
      <div class="grid grid-2" style="gap: 2rem;">
        
        <!-- Program 1: Personal Training -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem;">
            
          </div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            1 x per week
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Volledig aangepaste trainingssessies op jouw niveau, doelen en agenda.
            Werk direct met Mark voor maximale resultaten en verantwoordelijkheid.
          </p>
          <div class="price-tag">€85 / sessie</div>
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>


        <!-- Program 2: Personal Training -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem;">
            
          </div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            2 x per week
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Volledig aangepaste trainingssessies op jouw niveau, doelen en agenda.
            Werk direct met Mark voor maximale resultaten en verantwoordelijkheid.
          </p>
          <div class="price-tag">€75 / sessie</div>
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>


        <!-- Program 3: Personal Training -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem;">
           
          </div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            3 x per week
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Volledig aangepaste trainingssessies op jouw niveau, doelen en agenda.
            Werk direct met Mark voor maximale resultaten en verantwoordelijkheid.
          </p>
          <div class="price-tag">€70 / sessie</div>
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>
        <div style="display: block;"></div>
        <h1 class="ontwerp">Small Group Training</h1>
        <
        </div>
      </div>
        <div class="container">
      <div class="grid grid-2" style="gap: 2rem;">
        <!-- Program 4: Group Training -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            1 x per week
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Dynamische groepstrainingen in kleine groepen van max 4 personen voor een motiverende en sociale workout-ervaring.
            Train samen met anderen terwijl je werkt aan je persoonlijke doelen.
          </p>
          <div class="price-tag">€150 / maand</div>
          
          
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>


        <!-- Program 5: Group Training -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            2 x per week
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Dynamische groepstrainingen in kleine groepen van max 4 personen voor een motiverende en sociale workout-ervaring.
            Train samen met anderen terwijl je werkt aan je persoonlijke doelen.
          </p>
          <div class="price-tag">€140 / maand</div>
          
          
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>


        <!-- Program 6: Group Training -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            3 x perweek
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Dynamische groepstrainingen in kleine groepen van max 4 personen voor een motiverende en sociale workout-ervaring.
            Train samen met anderen terwijl je werkt aan je persoonlijke doelen.
          </p>
          <div class="price-tag">€130 / maand</div>
          
          
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="stats" style="padding: 6rem 0;">
    <div class="container">
      <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 style="font-size: clamp(2rem, 5vw, 3rem); margin-bottom: 1.25rem;">
      Klaar om te trainen ? boek nu !
        </h2>
      
        <a href="booking.php" class="btn" style="background-color: white; color: #e8580a;">
          BOEK een CONSULT →
        </a>
      </div>
    </div>
  </section>

  <script src="../js/main.js"></script>
</body>
</html>
<?php
include '../includes/footer.php';
?>
