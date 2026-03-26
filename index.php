
<?php
include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
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
          TRAIN WITH<br>
          <span class="highlight">PURPOSE.</span><br>
          LIVE WITH<br>
          POWER.
        </h1>
        <p>
          Expert personal training tailored to your goals. Whether you want to lose weight, 
          build muscle, or boost performance — Mark Cox will get you there.
        </p>
        <div class="hero-buttons">
          <a href="pages/booking.html" class="btn btn-primary">
            BOOK CONSULTATION →
          </a>
          <a href="pages/services.html" class="btn btn-secondary">
            VIEW PROGRAMS
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
          <div class="stat-label">Clients Trained</div>
        </div>
        <div class="stat-item">
          <div class="stat-value">15+</div>
          <div class="stat-label">Years Experience</div>
        </div>
        <div class="stat-item">
          <div class="stat-value">98%</div>
          <div class="stat-label">Success Rate</div>
        </div>
        <div class="stat-item">
          <div class="stat-value">4.9</div>
          <div class="stat-label">Average Rating</div>
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
            <span>About Mark</span>
          </div>
          <h2 style="margin-bottom: 1.5rem; line-height: 1.2;">
            YOUR COACH,<br>
            YOUR <span class="highlight">CHAMPION</span>
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1rem;">
            Mark Cox is a certified personal trainer based in Amsterdam with over 15 years of experience 
            transforming the lives of his clients. His philosophy combines science-backed training methods 
            with a deep understanding of individual needs.
          </p>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 2rem;">
            Whether you're just starting out or looking to push your performance to the next level, 
            Mark creates personalised programs that deliver real, lasting results.
          </p>
          <a href="about.html" class="btn btn-primary">
            READ MORE ABOUT MARK →
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
          What I Offer
        </div>
        <h2>TRAINING <span class="highlight">PROGRAMS</span></h2>
      </div>
      
      <div class="grid grid-3">
        <div class="card">
          <img src="images/duo-training.webp" 
               alt="Personal Training" 
               style="width: 100%; aspect-ratio: 3/4; object-fit: cover; border-radius: 0.75rem; margin-bottom: 1rem;">
          <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Personal Training/ Duo Training</h3>
          <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; margin-bottom: 1rem;">
            1-on-1 sessions tailored to your goals, fitness level and schedule.
          </p>
          <a href="services.html" style="color: #e8580a; font-size: 0.8rem; font-weight: 600; text-decoration: none;">
            Learn More →
          </a>
        </div>
        
        <div class="card">
          <img src="images/groep.webp"     
               alt="Outdoor Bootcamp" 
               style="width: 100%; aspect-ratio: 3/4; object-fit: cover; border-radius: 0.75rem; margin-bottom: 1rem;">
          <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Groep Training</h3>
          <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; margin-bottom: 1rem;">
            High-energy group sessions that make fitness fun and social.
          </p>
          <a href="services.html" style="color: #e8580a; font-size: 0.8rem; font-weight: 600; text-decoration: none;">
            Learn More →
          </a>
        </div>
        
        
      </div>
      
      <div class="text-center" style="margin-top: 2.5rem;">
        <a href="services.html" class="btn btn-secondary">
          VIEW ALL PROGRAMS →
        </a>
      </div>
    </div>
  </section>

  <!-- CTA Banner -->
  <section class="stats" style="padding: 6rem 0;">
    <div class="container">
      <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 style="font-size: clamp(2rem, 5vw, 3.5rem); margin-bottom: 1.25rem;">
          READY TO START YOUR TRANSFORMATION?
        </h2>
        <p style="color: rgba(255, 255, 255, 0.8); font-size: 1rem; margin-bottom: 2.5rem;">
          Book your free consultation today and take the first step towards the body and lifestyle you deserve.
        </p>
        <a href="booking.html" class="btn" style="background-color: white; color: #e8580a;">
          BOOK YOUR FREE SESSION →
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  

  <script src="main.js"></script>
</body>
</html>
<?php
include 'includes/footer.php';
?>
