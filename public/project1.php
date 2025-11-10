<?php ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <button class="lang-toggle" id="langToggle" aria-label="Toggle language">ENG</button>
  <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme"></button>
  <div class="stars" aria-hidden>
    <?php
      for ($i = 0; $i < 10; $i++) {
        $top = rand(5, 90);   
        $left = rand(5, 95);  
        echo '<div class="star" style="top: ' . $top . '%; left: ' . $left . '%;"></div>';
      }
    ?>
  </div>
  <nav>
    <a href="index.php">Home</a>
    <a href="projects.php" class="active">Projects</a>
    <a href="cv.php">CV</a>
    <a href="about.php">About Me</a>
    <a href="contact.php" >Contact</a>
  </nav>
  <main>
    <div style="max-width: 40rem; margin: 0 auto; text-align: center;">
      <h2>Scope Mania Webshop</h2>
      <p style="color:var(--muted); margin-top:0.25rem;">November 2024</p>
      <img src="img/webshop1.webp" alt="Scope Mania Webshop" style="width:100%;max-width:36rem;height:auto;border-radius:0.75rem;box-shadow:0 10px 28px var(--elev);margin:0.8rem 0;">
      <p style="text-align:left;color:var(--text);line-height:1.5;">
        Scope Mania Webshop — a demo ecommerce project built with PHP/HTML/CSS. Features product listing, cart and basic checkout UI.
      </p>
      <div class="card-btns" style="justify-content:center;margin-top:1rem;">
        <a class="github-btn" href="https://github.com/asfm17/BO-Webshop.git" target="_blank" rel="noopener">
          <img src="img/logo5.webp" alt="GitHub" class="github-logo" loading="lazy" /> Github
        </a>
        <a class="site-btn" href="#" target="_blank" rel="noopener">
          Site <span class="arrow">→</span>
        </a>
      </div>
    </div>
  </main>
  <script>
    function randomizeStars() {
      document.querySelectorAll('.star').forEach(function(star) {
        star.style.top = (Math.random() * 85 + 5) + '%';
        star.style.left = (Math.random() * 90 + 5) + '%';
      });
    }
    document.querySelectorAll('.star').forEach(function(star) {
      star.addEventListener('animationiteration', randomizeStars);
    });
    randomizeStars();
  </script>
  <script>
    (function(){
      const root = document.documentElement;
      const btn = document.getElementById('themeToggle');
      const langBtn = document.getElementById('langToggle');
      const getSystem = () => (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) ? 'light' : 'dark';
      const saved = localStorage.getItem('theme');
      const initial = (saved === 'light' || saved === 'dark') ? saved : getSystem();
      root.setAttribute('data-theme', initial);
      if (btn) {
        btn.type = 'button';
        btn.addEventListener('click', function() {
          btn.classList.add('toggling');
          const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
          root.setAttribute('data-theme', next);
          localStorage.setItem('theme', next);
          setTimeout(() => btn.classList.remove('toggling'), 300);
        });
      }
      const dict = {
        en: { 'nav.home':'Home','nav.projects':'Projects','nav.cv':'CV','nav.about':'About Me','nav.contact':'Contact','page.title':'Projects' },
        nl: { 'nav.home':'Home','nav.projects':'Projecten','nav.cv':'CV','nav.about':'Over mij','nav.contact':'Contact','page.title':'Projecten' }
      };
      function applyLang(lang){
        const t = dict[lang]; if(!t) return;
        const navLinks = document.querySelectorAll('nav a');
        navLinks[0] && (navLinks[0].textContent = t['nav.home']);
        navLinks[1] && (navLinks[1].textContent = t['nav.projects']);
        navLinks[2] && (navLinks[2].textContent = t['nav.cv']);
        navLinks[3] && (navLinks[3].textContent = t['nav.about']);
        navLinks[4] && (navLinks[4].textContent = t['nav.contact']);
      }
      const savedLang = localStorage.getItem('lang') || 'en';
      applyLang(savedLang);
      if (langBtn) {
        langBtn.textContent = savedLang === 'en' ? 'ENG' : 'NL';
        langBtn.addEventListener('click', function(){
          const next = (localStorage.getItem('lang')||'en') === 'en' ? 'nl':'en';
          localStorage.setItem('lang', next);
          langBtn.textContent = next === 'en' ? 'ENG' : 'NL';
          applyLang(next);
        });
      }
    })();
  </script>
  <script>
    (function() {
      const root = document.documentElement;
      const saved = localStorage.getItem('theme');
      if (saved === 'light' || saved === 'dark') {
        root.setAttribute('data-theme', saved);
      }
      const btn = document.getElementById('themeToggle');
       btn.type = 'button';
       btn.addEventListener('click', function() {
         btn.classList.add('toggling');
         const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
         root.setAttribute('data-theme', next);
         localStorage.setItem('theme', next);
         setTimeout(() => btn.classList.remove('toggling'), 300);
       });
    })();
  </script>
</body>
</html>