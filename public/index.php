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
    <?php
      for ($i = 0; $i < 10; $i++) {
        $top = rand(5, 90);   // percent
        $left = rand(5, 95);  // percent
        echo '<div class="star" style="top: ' . $top . '%; left: ' . $left . '%;"></div>';
      }
    ?>
  </div>
  <nav>
    <a href="index.php" class="active">Home</a>
    <a href="projects.php">Projects</a>
    <a href="cv.php">CV</a>
    <a href="about.php">About Me</a>
    <a href="contact.php">Contact</a>
  </nav>
  <div class="nameandskills">
    <p>Akira San Felipe Maestre</p>
  </div>
  <h2 class="skills-title">Skills</h2>
  <div class="skillslist">
    <ul>
      <li>
        <span class="skill-text">HTML/PHP</span>
        <span class="skill-logos">
          <img class="skill-logo" src="img/logo1.webp" alt="HTML logo" loading="lazy" onerror="this.style.display='none'">
          <img class="skill-logo" src="img/logo2.webp" alt="PHP logo" loading="lazy" onerror="this.style.display='none'">
        </span>
        <span class="skill-stars" aria-hidden="true">
          <span class="star-outside">★</span>
          <span class="star-outside">★</span>
          <span class="star-outside">★</span>
        </span>
      </li>
      <li>
        <span class="skill-text">CSS</span>
        <span class="skill-logos">
          <img class="skill-logo" src="img/logo3.webp" alt="CSS logo" loading="lazy" onerror="this.style.display='none'">
        </span>
        <span class="skill-stars" aria-hidden="true">
          <span class="star-outside">★</span>
          <span class="star-outside">★</span>
          <span class="star-outside">★</span>
        </span>
      </li>
      <li>
        <span class="skill-text">JavaScript</span>
        <span class="skill-logos">
          <img class="skill-logo" src="img/logo4.webp" alt="JavaScript logo" loading="lazy" onerror="this.style.display='none'">
        </span>
        <span class="skill-stars" aria-hidden="true">
          <span class="star-outside">★</span>
          <span class="star-outside">★</span>
        </span>
      </li>
      <li>
        <span class="skill-text">Git</span>
        <span class="skill-logos">
          <img class="skill-logo" src="img/logo5.webp" alt="Git logo" loading="lazy" onerror="this.style.display='none'">
        </span>
        <span class="skill-stars" aria-hidden="true">
          <span class="star-outside">★</span>
          <span class="star-outside">★</span>
          <span class="star-outside">★</span>
        </span>
      </li>
      <li>
        <span class="skill-text">Docker Desktop</span>
        <span class="skill-logos">
          <img class="skill-logo" src="img/logo6.webp" alt="Docker logo" loading="lazy" onerror="this.style.display='none'">
        </span>
        <span class="skill-stars" aria-hidden="true">
          <span class="star-outside">★</span>
          <span class="star-outside">★</span>
        </span>
      </li>
    </ul>
  </div>
 <img id="pfp" src="img/pfp.webp" alt="pfp">
  
  <!-- Placeholder projects in 3-column grid -->
  <h2 class="projects-title">Top Projects</h2>
  <section class="projects-grid">
    <article class="card">
      <h3>Scope Mania Webshop</h3>
      <p>November 2024</p>
      <img class="card-img" src="img/webshop1.webp" alt="Scope Mania Webshop" loading="lazy">
      <div class="card-btns">
        <a class="github-btn" href="https://github.com/asfm17/BO-Webshop.git" target="_blank" rel="noopener">
          <img src="img/logo5.webp" alt="GitHub" class="github-logo" loading="lazy" />
          Github
        </a>
        <button class="site-btn">
          Site <span class="arrow">→</span>
        </button>
      </div>
    </article>
    <article class="card">
      <h3>Dot Collector Game</h3>
      <p>June 2025</p>
      <img class="card-img" src="img/dotcollector.webp" alt="Dot Collector Game" loading="lazy">
      <div class="card-btns">
        <a class="github-btn" href="https://github.com/asfm17/M8-JSGAME.git" target="_blank" rel="noopener">
          <img src="img/logo5.webp" alt="GitHub" class="github-logo" loading="lazy" />
          Github
        </a>
        <button class="site-btn">
          Site <span class="arrow">→</span>
        </button>
      </div>
    </article>
    <article class="card">
      <h3>My Portfolio</h3>
      <p>October 2025</p>
      <img class="card-img" src="img/myportfolio.webp" alt="My Portfolio" loading="lazy">
      <div class="card-btns">
        <a class="github-btn" href="https://github.com/asfm17/M9Portfolio.git" target="_blank" rel="noopener">
          <img src="img/logo5.webp" alt="GitHub" class="github-logo" loading="lazy" />
          Github
        </a>
      </div>
    </article>
  </section>
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
    (function() {
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
      // Language toggle
      const dict = {
        en: {
          'nav.home': 'Home',
          'nav.projects': 'Projects',
          'nav.cv': 'CV',
          'nav.about': 'About Me',
          'name': 'Name: Akira San Felipe Maestre',
          'date': 'Date of Birth: 22-08-2006',
          'nav.contact': 'Contact',
          'skills.title': 'Skills',
          'projects.title': 'Top Projects',
          'project1.title': 'Scope Mania Webshop'
        },
        nl: {
          'nav.home': 'Home',
          'nav.projects': 'Projecten',
          'nav.cv': 'CV',
          'nav.about': 'Over mij',
          'name': 'Naam: Akira San Felipe Maestre',
          'date': 'Geboortedatum: 22-08-2006',
          'nav.contact': 'Contact',
          'skills.title': 'Vaardigheden',
          'projects.title': 'Top Projecten',
          'project1.title': 'Scope Mania Webshop',
        }
      };
      function applyLang(lang) {
        const t = dict[lang];
        if (!t) return;
        // nav
        const navLinks = document.querySelectorAll('nav a');
        navLinks[0] && (navLinks[0].textContent = t['nav.home']);
        navLinks[1] && (navLinks[1].textContent = t['nav.projects']);
        navLinks[2] && (navLinks[2].textContent = t['nav.cv']);
        navLinks[3] && (navLinks[3].textContent = t['nav.about']);
        navLinks[4] && (navLinks[4].textContent = t['nav.contact']);
        // skills title
        const skillsTitle = document.querySelector('.skills-title');
        if (skillsTitle) skillsTitle.textContent = t['skills.title'];
        // projects title
        const projectsTitle = document.querySelector('.projects-title');
        if (projectsTitle) projectsTitle.textContent = t['projects.title'];
        // first card
        const firstCard = document.querySelector('.projects-grid .card');
        if (firstCard) {
          const h3 = firstCard.querySelector('h3');
          const p = firstCard.querySelector('p');
          if (h3) h3.textContent = t['project1.title'];
        }
        // other cards soon text
      }
      const savedLang = localStorage.getItem('lang') || 'en';
      applyLang(savedLang);
      if (langBtn) {
        langBtn.textContent = savedLang === 'en' ? 'ENG' : 'NL';
        langBtn.addEventListener('click', function() {
          const next = (localStorage.getItem('lang') || 'en') === 'en' ? 'nl' : 'en';
          localStorage.setItem('lang', next);
          langBtn.textContent = next === 'en' ? 'ENG' : 'NL';
          applyLang(next);
        });
      }
    })();
  </script>
</body>
</html>