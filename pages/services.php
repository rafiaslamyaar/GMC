<?php
include "../includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Training Programs - Mark Cox Training</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../styles.css">
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
        <span>What I Offer</span>
      </div>
      <h1 style="font-size: clamp(2.2rem, 5vw, 3.8rem); font-weight: 800; margin-bottom: 1rem;">
        TRAINING<br>
        <span class="highlight">PROGRAMS</span>
      </h1>
      <p style="color: rgba(255, 255, 255, 0.5); max-width: 700px; font-size: 1.05rem; line-height: 1.7;">
        Choose the program that fits your goals and lifestyle. All packages include personalized 
        training plans, progress tracking, and ongoing support.
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
              Most Popular
            </span>
          </div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            1-on-1 Personal Training
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Fully customized training sessions tailored to your fitness level, goals, and schedule. 
            Work directly with Mark for maximum results and accountability.
          </p>
          <div class="price-tag">€75 / session</div>
          
          <ul class="features-list">
            <li>One-on-one coaching with Mark</li>
            <li>Personalized workout programs</li>
            <li>Form correction & technique guidance</li>
            <li>Progress tracking & adjustments</li>
            <li>Nutrition advice included</li>
            <li>Flexible scheduling</li>
          </ul>
          
          <a href="booking.html" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOOK NOW
          </a>
        </div>

        <!-- Program 2: Outdoor Bootcamp -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            Outdoor Bootcamp
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            High-energy group workouts in Amsterdam's beautiful parks. Fun, challenging, 
            and effective sessions with a supportive community vibe.
          </p>
          <div class="price-tag">€30 / session</div>
          
          <ul class="features-list">
            <li>Small group training (max 8 people)</li>
            <li>Outdoor sessions in Amsterdam parks</li>
            <li>Full-body functional training</li>
            <li>All fitness levels welcome</li>
            <li>Community motivation</li>
            <li>Weather-adapted workouts</li>
          </ul>
          
          <a href="booking.html" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOOK NOW
          </a>
        </div>

        <!-- Program 3: Strength & Performance -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            Strength & Performance
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Advanced program for athletes and experienced lifters looking to maximize strength, 
            power, and athletic performance.
          </p>
          <div class="price-tag">€90 / session</div>
          
          <ul class="features-list">
            <li>Sport-specific training programs</li>
            <li>Advanced strength protocols</li>
            <li>Power & explosiveness training</li>
            <li>Performance testing & analysis</li>
            <li>Recovery optimization</li>
            <li>Competition prep support</li>
          </ul>
          
          <a href="booking.html" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOOK NOW
          </a>
        </div>

        <!-- Program 4: Nutrition Coaching -->
        <div class="program-card">
          <div style="margin-bottom: 1.5rem; height: 28px;"></div>
          <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 1rem;">
            Nutrition Coaching
          </h2>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem; line-height: 1.7;">
            Custom meal plans and nutritional strategies to support your fitness goals. 
            Learn how to fuel your body for optimal performance and results.
          </p>
          <div class="price-tag">€150 / month</div>
          
          <ul class="features-list">
            <li>Personalized meal plans</li>
            <li>Macro & calorie calculations</li>
            <li>Weekly check-ins & adjustments</li>
            <li>Supplement recommendations</li>
            <li>Recipe ideas & meal prep tips</li>
            <li>Ongoing support via WhatsApp</li>
          </ul>
          
          <a href="booking.html" class="btn btn-primary" style="width: 100%; justify-content: center; margin-top: 1.5rem;">
            BOOK NOW
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- Packages -->
  <section style="background-color: #111111;">
    <div class="container">
      <div class="section-header">
        <div class="section-label">Save More</div>
        <h2>SESSION <span class="highlight">PACKAGES</span></h2>
        <p style="color: rgba(255, 255, 255, 0.5); margin-top: 1rem; max-width: 600px; margin-left: auto; margin-right: auto;">
          Commit to your transformation and save with multi-session packages
        </p>
      </div>
      
      <div class="grid grid-3">
        <div class="card" style="text-align: center; padding: 2.5rem 2rem;">
          <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">STARTER</h3>
          <div style="font-size: 2.5rem; font-weight: 800; color: #e8580a; margin-bottom: 0.5rem;">€350</div>
          <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.85rem; margin-bottom: 2rem;">5 sessions</p>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem;">
            Perfect for trying out personal training
          </p>
          <ul style="list-style: none; text-align: left; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin-bottom: 2rem;">
            <li style="padding: 0.5rem 0;">✓ €70 per session</li>
            <li style="padding: 0.5rem 0;">✓ Valid for 6 weeks</li>
            <li style="padding: 0.5rem 0;">✓ Flexible scheduling</li>
          </ul>
          <a href="booking.html" class="btn btn-secondary" style="width: 100%; justify-content: center;">
            GET STARTED
          </a>
        </div>
        
        <div class="card" style="text-align: center; padding: 2.5rem 2rem; border-color: #e8580a; position: relative;">
          <div style="position: absolute; top: -12px; left: 50%; transform: translateX(-50%); background-color: #e8580a; color: white; padding: 0.4rem 1rem; border-radius: 999px; font-size: 0.7rem; font-weight: 700;">
            BEST VALUE
          </div>
          <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">TRANSFORM</h3>
          <div style="font-size: 2.5rem; font-weight: 800; color: #e8580a; margin-bottom: 0.5rem;">€650</div>
          <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.85rem; margin-bottom: 2rem;">10 sessions</p>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem;">
            Most popular choice for serious results
          </p>
          <ul style="list-style: none; text-align: left; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin-bottom: 2rem;">
            <li style="padding: 0.5rem 0;">✓ €65 per session</li>
            <li style="padding: 0.5rem 0;">✓ Valid for 12 weeks</li>
            <li style="padding: 0.5rem 0;">✓ Priority scheduling</li>
            <li style="padding: 0.5rem 0;">✓ Free meal plan</li>
          </ul>
          <a href="booking.html" class="btn btn-primary" style="width: 100%; justify-content: center;">
            GET STARTED
          </a>
        </div>
        
        <div class="card" style="text-align: center; padding: 2.5rem 2rem;">
          <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem;">ELITE</h3>
          <div style="font-size: 2.5rem; font-weight: 800; color: #e8580a; margin-bottom: 0.5rem;">€1200</div>
          <p style="color: rgba(255, 255, 255, 0.5); font-size: 0.85rem; margin-bottom: 2rem;">20 sessions</p>
          <p style="color: rgba(255, 255, 255, 0.6); margin-bottom: 1.5rem;">
            Ultimate commitment to transformation
          </p>
          <ul style="list-style: none; text-align: left; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin-bottom: 2rem;">
            <li style="padding: 0.5rem 0;">✓ €60 per session</li>
            <li style="padding: 0.5rem 0;">✓ Valid for 24 weeks</li>
            <li style="padding: 0.5rem 0;">✓ VIP scheduling</li>
            <li style="padding: 0.5rem 0;">✓ Full nutrition program</li>
            <li style="padding: 0.5rem 0;">✓ 24/7 WhatsApp support</li>
          </ul>
          <a href="booking.html" class="btn btn-secondary" style="width: 100%; justify-content: center;">
            GET STARTED
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
          NOT SURE WHICH PROGRAM IS RIGHT FOR YOU?
        </h2>
        <p style="color: rgba(255, 255, 255, 0.8); font-size: 1rem; margin-bottom: 2.5rem;">
          Book a free 30-minute consultation to discuss your goals and find the perfect fit.
        </p>
        <a href="booking.html" class="btn" style="background-color: white; color: #e8580a;">
          BOOK FREE CONSULTATION →
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
