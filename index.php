<?php
include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mark Cox Training - Personal Training in Amsterdam</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
 
  <section class="hero">
    <div class="hero-bg">
      <img src="images/markcox-background.webp" alt="Personal Training">
      <div class="hero-overlay"></div>
      <div class="hero-overlay-bottom"></div>
    </div>
    
    <div class="container">
      <div class="hero-content">
        
        <h1>
          TRAIN MET<br>
          <span class="highlight">DOEL.</span><br>
          LEEF MET<br>
          <span class="highlight">KRACHT.</span>
        </h1>
        <p>
          Expert personal training op maat van jouw doelen. Of je nu wil afvallen, spieren opbouwen,
          of je prestaties wil verbeteren — Mark Cox helpt je er te komen.
        </p>
        <div class="hero-buttons">
          <a href="pages/booking.php" class="btn btn-primary">
            BOEK CONSULTATIE →
          </a>
          <a href="pages/services.php" class="btn btn-secondary">
            BEKIJK PROGRAMMA'S
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="stats">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-value">500+</div>
          <div class="stat-label">Getrainde cliënten</div>
        </div>
        <div class="stat-item">
          <div class="stat-value">15+</div>
          <div class="stat-label">Jaren ervaring</div>
        </div>
        <div class="stat-item">
          <div class="stat-value">98%</div>
          <div class="stat-label">Slagingspercentage</div>
        </div>
        <div class="stat-item">
          <div class="stat-value">4.9</div>
          <div class="stat-label">Gemiddelde beoordeling</div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Teaser -->
  <section style="background-color: #0c0c0c;">
    <div class="container">
      <div class="grid grid-2" style="gap: 4rem; align-items: center;">
        <div>
          <img src="images/markcox-image.webp" 
               alt="Mark Cox" 
               style="width: 100%; border-radius: 1rem; aspect-ratio: 4/5; object-fit: cover;">
        </div>
        <div>
          <div class="hero-label">
            <span>Over Mark</span>
          </div>
          <h2 style="margin-bottom: 1.5rem; line-height: 1.2;">
            JOUW COACH,<br>
            JOUW <span class="highlight">KAMPIOEN</span>
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1rem;">
           Ik ben geboren en getogen in Zeist waar ik in mijn jeugd bij hockey club Schaerweijde en tennis club Shot heb gespeeld. Eigenlijk staat mijn hele leven in het teken van sporten en een gezonde levensstijl. Ik heb een tijd gereisd en veel ervaringen opgedaan. Inmiddels woon ik weer in de omgeving van Zeist en heb mijn eigen gym ingericht waar ik met veel plezier aan het werk ben om iedereen die dat wil te motiveren en te begeleiden. Opgeleid en gespecialiseerd in Fitness Nutrition, Kracht en Conditie training en Corrective Excercises. Graag deel ik mijn ervaringen met jou, om dagelijks met heel veel plezier, effectief en efficiënt te bewegen. 
          </p>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 2rem;">
            Of je nu net begint of je prestaties wil verbeteren, Mark maakt gepersonaliseerde programma's
            die echte, blijvende resultaten opleveren.
          </p>
          <a href="about.php" class="btn btn-primary">
            MEER OVER MARK LEZEN →
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Preview -->
  <section style="background-color: #111111;">
    <div class="container">
      <div class="section-header">
        <div class="section-label">
          Wat ik aanbied
        </div>
        <h2>TRAINING <span class="highlight">PROGRAMMA'S</span></h2>
      </div>
      
      <div class="grid grid-3">
        <div class="card">
          <img src="images/duo-training.webp" 
               alt="Personal Training" 
               style="width: 100%; aspect-ratio: 3/4; object-fit: cover; border-radius: 0.75rem; margin-bottom: 1rem;">
          <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Personal Training / Duo Training</h3>
          <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; margin-bottom: 1rem;">
            1-op-1 sessies op maat van jouw doelen, niveau en agenda.
          </p>
          <a href="services.php" style="color: #e8580a; font-size: 0.8rem; font-weight: 600; text-decoration: none;">
            Lees meer →
          </a>
        </div>
        
        <div class="card">
          <img src="images/groep.webp"     
               alt="Outdoor Bootcamp" 
               style="width: 100%; aspect-ratio: 3/4; object-fit: cover; border-radius: 0.75rem; margin-bottom: 1rem;">
          <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Groepstraining</h3>
          <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; margin-bottom: 1rem;">
            Energierijke groepstrainingen die sport leuk en sociaal maken.
          </p>
          <a href="services.php" style="color: #e8580a; font-size: 0.8rem; font-weight: 600; text-decoration: none;">
            Lees meer →
          </a>
        </div>
        
        
      </div>
      
      <div class="text-center" style="margin-top: 2.5rem;">
        <a href="services.php" class="btn btn-secondary">
          BEKIJK ALLE PROGRAMMA'S →
        </a>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="stats" style="padding: 6rem 0;">
    <div class="container">
      <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 style="font-size: clamp(2rem, 5vw, 3.5rem); margin-bottom: 1.25rem;">
          KLAAR OM JE TRANSFORMATIE TE STARTEN?
        </h2>
        <p style="color: rgba(255, 255, 255, 0.8); font-size: 1rem; margin-bottom: 2.5rem;">
          Boek vandaag nog je consult en zet de eerste stap naar het lichaam en leven dat je verdient.
        </p>
        <a href="pages/booking.php" class="btn" style="background-color: white; color: #e8580a;">
          BOEK JE SESSIE →
        </a>
      </div>
    </div>
  </section>

  <script src="main.js"></script>
</body>
</html>
<?php
include 'includes/footer.php';
?>
