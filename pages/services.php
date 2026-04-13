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

  <!-- Programs -->
  <section style="background-color: #0c0c0c;">
    <div class="container">
      <div class="grid grid-2" style="gap: 2rem;">
        
        <!-- Program 1: Personal Training -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem;">
            <span style="display: inline-block; background-color: rgba(232, 88, 10, 0.2); color: #e8580a; padding: 0.35rem 0.75rem; border-radius: 999px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
              Meest populair
            </span>
          </div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            1-op-1 Personal Training
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Volledig aangepaste trainingssessies op jouw niveau, doelen en agenda.
            Werk direct met Mark voor maximale resultaten en verantwoordelijkheid.
          </p>
          <div class="price-tag">€75 / sessie</div>
          
          <ul class="features-list">
            <li>Een-op-een coaching met Mark</li>
            <li>Gepersonaliseerde trainingsschema's</li>
            <li>Techniek- en houdingcorrectie</li>
            <li>Voortgangscontrole en aanpassingen</li>
            <li>Voedingsadvies inbegrepen</li>
            <li>Flexibele planning</li>
          </ul>
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>

        <!-- Program 2: Outdoor Bootcamp -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            Outdoor Bootcamp
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Energierijke groepstrainingen in mooie parken van Amsterdam. Leuk, uitdagend en effectief met een positieve sfeer.
          </p>
          <div class="price-tag">€30 / sessie</div>
          
          <ul class="features-list">
            <li>Kleine groepen (maximaal 8 personen)</li>
            <li>Buitensessies in Amsterdamse parken</li>
            <li>Functionele full-body training</li>
            <li>Alle fitnessniveaus welkom</li>
            <li>Motiverende groepsdynamiek</li>
            <li>Weerbestendige workouts</li>
          </ul>
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>

        <!-- Program 3: Strength & Performance -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            Kracht & Prestaties
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Geavanceerd programma voor atleten en ervaren krachtsporters die maximale kracht en prestaties willen halen.
          </p>
          <div class="price-tag">€90 / sessie</div>
          
          <ul class="features-list">
            <li>Sportgerichte trainingsprogramma's</li>
            <li>Geavanceerde krachtprotocolen</li>
            <li>Kracht- en explosiviteitstraining</li>
            <li>Prestatiemeting & analyse</li>
            <li>Hersteloptimalisatie</li>
            <li>Ondersteuning bij wedstrijdvoorbereiding</li>
          </ul>
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>

        <!-- Program 4: Nutrition Coaching -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            Voedingscoaching
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Op maat gemaakte maaltijdplannen en voedingsstrategieën om je doelen te ondersteunen.
            Leer je lichaam optimaal te voeden.
          </p>
          <div class="price-tag">€150 / maand</div>
          
          <ul class="features-list">
            <li>Persoonlijke maaltijdplannen</li>
            <li>Macro- en calorieberekeningen</li>
            <li>Wekelijkse check-ins & aanpassingen</li>
            <li>Supplementadvies</li>
            <li>Recepten & mealprep-tips</li>
            <li>Doorlopende WhatsApp-ondersteuning</li>
          </ul>
          
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOEK NU
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- Packages -->
  <section style="background-color: #111111;">
    <div class="container">
      <div class="section-header">
        <div class="section-label">Bespaar meer</div>
        <h2>SESSIE <span class="highlight">PAKKETTEN</span></h2>
        <p style="color: rgba(255, 255, 255, 0.5); margin-top: 1rem; max-width: 600px; margin-left: auto; margin-right: auto;">
          Zet in op je transformatie en bespaar met pakketten met meerdere sessies.
        </p>
      </div>
      
      <div class="grid grid-3">
        <div class="card" style="text-align: center; padding: 2.5rem 2rem;">
          <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">STARTER</h3>
          <div style="font-size: 2.5rem; font-weight: 800; color: #e8580a; margin-bottom: 0.5rem;">€350</div>
          <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.85rem; margin-bottom: 2rem;">5 sessies</p>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem;">
            Perfect om personal training uit te proberen
          </p>
          <ul style="list-style: none; text-align: left; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin-bottom: 2rem;">
            <li style="padding: 0.5rem 0;">✓ €70 per sessie</li>
            <li style="padding: 0.5rem 0;">✓ Geldig 6 weken</li>
            <li style="padding: 0.5rem 0;">✓ Flexibele planning</li>
          </ul>
          <a href="booking.php" class="btn btn-secondary" style="width: 100%; justify-content: center;">
            STARTEN
          </a>
        </div>
        
        <div class="card" style="text-align: center; padding: 2.5rem 2rem; border-color: #e8580a; position: relative;">
          <div style="position: absolute; top: -12px; left: 50%; transform: translateX(-50%); background-color: #e8580a; color: white; padding: 0.4rem 1rem; border-radius: 999px; font-size: 0.7rem; font-weight: 700;">
            BESTE WAARDE
          </div>
          <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">TRANSFORMEREN</h3>
          <div style="font-size: 2.5rem; font-weight: 800; color: #e8580a; margin-bottom: 0.5rem;">€650</div>
          <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.85rem; margin-bottom: 2rem;">10 sessies</p>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem;">
            Populairste keuze voor serieuze resultaten
          </p>
          <ul style="list-style: none; text-align: left; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin-bottom: 2rem;">
            <li style="padding: 0.5rem 0;">✓ €65 per sessie</li>
            <li style="padding: 0.5rem 0;">✓ Geldig 12 weken</li>
            <li style="padding: 0.5rem 0;">✓ Prioriteitsplanning</li>
            <li style="padding: 0.5rem 0;">✓ Gratis maaltijdplan</li>
          </ul>
          <a href="booking.php" class="btn btn-primary" style="width: 100%; justify-content: center;">
            STARTEN
          </a>
        </div>
        
        <div class="card" style="text-align: center; padding: 2.5rem 2rem;">
          <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">ELITE</h3>
          <div style="font-size: 2.5rem; font-weight: 800; color: #e8580a; margin-bottom: 0.5rem;">€1200</div>
          <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.85rem; margin-bottom: 2rem;">20 sessies</p>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem;">
            Ultieme inzet voor transformatie
          </p>
          <ul style="list-style: none; text-align: left; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin-bottom: 2rem;">
            <li style="padding: 0.5rem 0;">✓ €60 per sessie</li>
            <li style="padding: 0.5rem 0;">✓ Geldig 24 weken</li>
            <li style="padding: 0.5rem 0;">✓ VIP planning</li>
            <li style="padding: 0.5rem 0;">✓ Volledig voedingsprogramma</li>
            <li style="padding: 0.5rem 0;">✓ 24/7 WhatsApp-ondersteuning</li>
          </ul>
          <a href="booking.php" class="btn btn-secondary" style="width: 100%; justify-content: center;">
            STARTEN
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
          WEET JE NIET WELK PROGRAMMA BIJ JE PAST?
        </h2>
        <p style="color: rgba(255, 255, 255, 0.8); font-size: 1rem; margin-bottom: 2.5rem;">
          Boek een gratis consult van 30 minuten om je doelen te bespreken en de beste keuze te vinden.
        </p>
        <a href="booking.php" class="btn" style="background-color: white; color: #e8580a;">
          BOEK GRATIS CONSULT →
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
