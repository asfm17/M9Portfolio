<?php ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Portfolio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <button class="lang-toggle" id="langToggle" aria-label="Toggle language">ENG</button>
  <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme"></button>
  <div class="stars" aria-hidden>
    <div class="star" style="top: 20%; left: 80%;"></div>
    <div class="star" style="top: 40%; left: 60%;"></div>
    <div class="star" style="top: 70%; left: 90%;"></div>
    <div class="star" style="top: 10%; left: 30%;"></div>
    <div class="star" style="top: 50%; left: 10%;"></div>
  </div>
  <nav>
    <a href="index.php">Home</a>
    <a href="projects.php">Projects</a>
    <a href="cv.php" class="active">CV</a>
    <a href="about.php">About Me</a>
    <a href="contact.php">Contact</a>
  </nav>
  <script>
    function randomizeStars() {
      document.querySelectorAll('.star').forEach(function(star) {
        star.style.top = (Math.random() * 85 + 5) + '%';
        star.style.left = (Math.random() * 90 + 5) + '%';
      });
    }
    // Listen for animation iteration
    document.querySelectorAll('.star').forEach(function(star) {
      star.addEventListener('animationiteration', randomizeStars);
    });
    // Initial randomization (optional, if you want to override PHP)
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
        en: { 'nav.home':'Home','nav.projects':'Projects','nav.cv':'CV','nav.about':'About Me','nav.contact':'Contact','page.title':'My Portfolio' },
        nl: { 'nav.home':'Home','nav.projects':'Projecten','nav.cv':'CV','nav.about':'Over mij','nav.contact':'Contact','page.title':'Mijn Portfolio' }
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
      const btn = document.getElementById('themeToggle');
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
    })();
  </script>
</body>
</html>