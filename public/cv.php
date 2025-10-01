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
        $top = rand(5, 90);
        $left = rand(5, 95);
        echo '<div class="star" style="top: ' . $top . '%; left: ' . $left . '%;"></div>';
      }
    ?>
  </div>
  <nav>
    <a href="index.php">Home</a>
    <a href="projects.php">Projects</a>
    <a href="cv.php" class="active">CV</a>
    <a href="about.php">About Me</a>
    <a href="contact.php">Contact</a>
  </nav>
  <main>
    <div class="blog-list" style="max-width: 32rem; margin: 0 auto;">
      <div class="blog-item">
        <h2 id="cv-title">Curriculum Vitae</h2>
        <h3 id="name">Name: Akira San Felipe Maestre</h3>
        <h3 id="date">Date of Birth: 22-08-2006</h3>
      </div>
      <div class="blog-item">
        <h3 id="education">Education:</h3>
        <ul>
          <li id="edu1">2019 - 2023: VMBO-T High School Diploma, Bonhoeffer College, Castricum</li>
          <li id="edu2">2023 - Present: Software Development, MediaCollege Amsterdam</li>
        </ul>
      </div>
      <div class="blog-item">
        <h3 id="experience">Development Work Experience:</h3>
        <ul>
          <li id="exp1">None</li>
        </ul>
      </div>
      <div class="blog-item">
        <h3 id="skills">Social Skills:</h3>
        <ul>
          <li id="soc1">Trilingual (Dutch, Spanish, English)</li>
          <li id="soc2">Curious, Problem-solving and teamwork</li>
        </ul>
        <h3 id="devskills">Development Skills:</h3>
        <ul>
          <li id="dev1">HTML, CSS, JavaScript, PHP</li>
          <li id="dev2">Git, Docker</li>
        </ul>
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
        en: {
          'nav.home':'Home',
          'nav.projects':'Projects',
          'nav.cv':'CV',
          'nav.about':'About Me',
          'nav.contact':'Contact',
          'page.title':'My Portfolio',
          'cv.title':'Curriculum Vitae',
          'cv.name':'Name: Akira San Felipe Maestre',
          'cv.date':'Date of Birth: 22-08-2006',
          'cv.education':'Education:',
          'cv.edu1':'2019 - 2023: VMBO-T High School Diploma, Bonhoeffer College, Castricum',
          'cv.edu2':'2023 - Present: Software Development, MediaCollege Amsterdam',
          'cv.experience':'Development Work Experience:',
          'cv.exp1':'None',
          'cv.skills':'Social Skills:',
          'cv.soc1':'Trilingual (Dutch, Spanish, English)',
          'cv.soc2':'Curious, Problem-solving and teamwork',
          'cv.devskills':'Development Skills:',
          'cv.dev1':'HTML, CSS, JavaScript, PHP',
          'cv.dev2':'Git, Docker'
        },
        nl: {
          'nav.home':'Home',
          'nav.projects':'Projecten',
          'nav.cv':'CV',
          'nav.about':'Over mij',
          'nav.contact':'Contact',
          'page.title':'Mijn Portfolio',
          'cv.title':'Curriculum Vitae',
          'cv.name':'Naam: Akira San Felipe Maestre',
          'cv.date':'Geboortedatum: 22-08-2006',
          'cv.education':'Opleiding:',
          'cv.edu1':'2019 - 2023: VMBO-T Diploma, Bonhoeffer College, Castricum',
          'cv.edu2':'2023 - heden: Software Development, MediaCollege Amsterdam',
          'cv.experience':'Ontwikkel Werkervaring:',
          'cv.exp1':'Geen',
          'cv.skills':'Sociale Vaardigheden:',
          'cv.soc1':'Drie-talig (Nederlands, Spaans, Engels)',
          'cv.soc2':'Nieuwsgierig, Probleemoplossend en samenwerken',
          'cv.devskills':'Ontwikkelvaardigheden:',
          'cv.dev1':'HTML, CSS, JavaScript, PHP',
          'cv.dev2':'Git, Docker'
        }
      };
      function applyLang(lang){
        const t = dict[lang]; if(!t) return;
        // nav
        const navLinks = document.querySelectorAll('nav a');
        navLinks[0] && (navLinks[0].textContent = t['nav.home']);
        navLinks[1] && (navLinks[1].textContent = t['nav.projects']);
        navLinks[2] && (navLinks[2].textContent = t['nav.cv']);
        navLinks[3] && (navLinks[3].textContent = t['nav.about']);
        navLinks[4] && (navLinks[4].textContent = t['nav.contact']);
        // cv
        document.getElementById('cv-title') && (document.getElementById('cv-title').textContent = t['cv.title']);
        document.getElementById('name') && (document.getElementById('name').textContent = t['cv.name']);
        document.getElementById('date') && (document.getElementById('date').textContent = t['cv.date']);
        document.getElementById('education') && (document.getElementById('education').textContent = t['cv.education']);
        document.getElementById('edu1') && (document.getElementById('edu1').textContent = t['cv.edu1']);
        document.getElementById('edu2') && (document.getElementById('edu2').textContent = t['cv.edu2']);
        document.getElementById('experience') && (document.getElementById('experience').textContent = t['cv.experience']);
        document.getElementById('exp1') && (document.getElementById('exp1').textContent = t['cv.exp1']);
        document.getElementById('skills') && (document.getElementById('skills').textContent = t['cv.skills']);
        document.getElementById('soc1') && (document.getElementById('soc1').textContent = t['cv.soc1']);
        document.getElementById('soc2') && (document.getElementById('soc2').textContent = t['cv.soc2']);
        document.getElementById('devskills') && (document.getElementById('devskills').textContent = t['cv.devskills']);
        document.getElementById('dev1') && (document.getElementById('dev1').textContent = t['cv.dev1']);
        document.getElementById('dev2') && (document.getElementById('dev2').textContent = t['cv.dev2']);
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