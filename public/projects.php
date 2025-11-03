<?php ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects</title>
  <link rel="stylesheet" href="/style.css">
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
    <a href="index.php">Home</a>
    <a href="projects.php" class="active">Projects</a>
    <a href="cv.php">CV</a>
    <a href="about.php">About Me</a>
    <a href="contact.php" >Contact</a>
  </nav>
  <main>
    <div class="blog-list">
      <div class="blog-item">
        <div class="blog-title"><a href="project1.php">Scope Mania Webshop</a></div>
        <div class="blog-date">November 2024</div>
        <img id="webshop1" class="pfp" src="/img/webshop1.webp" alt="Webshop 1">
        <div class="card-btns">
          <a class="github-btn" href="https://github.com/asfm17/BO-Webshop.git" target="_blank" rel="noopener">
            <img src="img/logo5.webp" alt="GitHub" class="github-logo" loading="lazy" />
            Github
          </a>
           <a id="webshop-btn" href="/Demos/webshop/telescopes.html" target="_blank">
        <button for="webshop-btn"class="site-btn">
            <span for="webshop-btn" class="arrow">Site →</span>
          </button>
          </a>
        </div>
      </div>
      <div class="blog-item">
        <div class="blog-title"><a href="#">Dot Collector Game</a></div>
        <div class="blog-date">June 2025</div>
        <img class="pfp project-img" src="/img/dotcollector.webp" alt="Dot Collector Game">
        <div class="card-btns">
          <a class="github-btn" href="https://github.com/asfm17/M8-JSGAME.git" target="_blank" rel="noopener">
            <img src="img/logo5.webp" alt="GitHub" class="github-logo" loading="lazy" />
            Github
          </a>
          <a id="dotcollectorgame-btn" href="/Demos/dotcollectorgame/index.html" target="_blank">
        <button for="dotcollector-btn"class="site-btn">
            <span for="dotcollector-btn" class="arrow">Site →</span>
          </button>
          </a>
        </div>
      </div>
      <div class="blog-item">
        <div class="blog-title"><a href="#">My Portfolio</a></div>
        <div class="blog-date">October 2025</div>
        <img class="pfp project-img" src="/img/myportfolio.webp" alt="My Portfolio">
        <div class="card-btns">
          <a class="github-btn" href="https://github.com/asfm17/M9Portfolio.git" target="_blank" rel="noopener">
            <img src="img/logo5.webp" alt="GitHub" class="github-logo" loading="lazy" />
            Github
          </a>
        </div>
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
        en: { 'nav.home':'Home','nav.projects':'Projects','nav.cv':'CV','nav.about':'About Me','nav.contact':'Contact','page.title':'Projects','soon':'November 2024|June 2025|October 2025' },
        nl: { 'nav.home':'Home','nav.projects':'Projecten','nav.cv':'CV','nav.about':'Over mij','nav.contact':'Contact','page.title':'Projecten','soon':'November 2024|June 2025|October 2025' }
      };
      function applyLang(lang){
        const t = dict[lang]; if(!t) return;
        const navLinks = document.querySelectorAll('nav a');
        navLinks[0] && (navLinks[0].textContent = t['nav.home']);
        navLinks[1] && (navLinks[1].textContent = t['nav.projects']);
        navLinks[2] && (navLinks[2].textContent = t['nav.cv']);
        navLinks[3] && (navLinks[3].textContent = t['nav.about']);
        navLinks[4] && (navLinks[4].textContent = t['nav.contact']);
        const h2 = document.querySelector('h2'); if(h2) h2.textContent = t['page.title'];
        // Set correct dates for each project
        const dates = t['soon'].split('|');
        document.querySelectorAll('.blog-list .blog-item .blog-date').forEach(function(p, i){
          if(dates[i]) p.textContent = dates[i];
        });
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
</body>
</html>