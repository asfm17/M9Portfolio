<?php ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Me</title>
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
    <a href="cv.php">CV</a>
    <a href="about.php" class="active">About Me</a>
    <a href="contact.php">Contact</a>
  </nav>
  <main>
    <h2 id="about-title">About Me</h2>
    <h3 id="about-name">Hallo, mijn naam is Akira en ik ben 19 jaar oud. 
      Ik doe de opleiding Software Development op het MediaCollege in Amsterdam.\
      Ik ben vooral goed in front -end development, maar ik wil graag meer leren over back-end. 
      Mijn hobby's zijn: naar raves gaan, gym en ik heb ook een telescoop! 
      Ik ben een goeie samenwerker en kom vaak met creatieve ideeën.
      Als u contact met mij wilt opnemen, kunt u dat doen door naar mijn Contact pagina te gaan.</h3>
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
      const dict = {
        en: {
          'nav.home':'Home','nav.projects':'Projects','nav.cv':'CV','nav.about':'About Me','nav.contact':'Contact',
          'about.title':'About Me',
          'about.name':'Hello, my name is Akira and I am 19 years old. I am studying Software Development at MediaCollege in Amsterdam. I am especially good at front-end development, but I would like to learn more about back-end. My hobbies are going to raves, working out at the gym, and I also have a telescope! I am a good team player and often come up with creative ideas. If you would like to get in touch with me, you can do so by visiting my Contact page.',
        },
        nl: {
          'nav.home':'Home','nav.projects':'Projecten','nav.cv':'CV','nav.about':'Over mij','nav.contact':'Contact',
          'about.title':'Over mij',
          'about.name':'Hallo, mijn naam is Akira en ik ben 19 jaar oud. Ik doe de opleiding Software Development op het MediaCollege in Amsterdam. Ik ben vooral goed in front -end development, maar ik wil graag meer leren over back-end. Mijn hobbys zijn: naar raves gaan, gym en ik heb ook een telescoop! Ik ben een goeie samenwerker en kom vaak met creatieve ideeën. Als u contact met mij wilt opnemen, kunt u dat doen door naar mijn Contact pagina te gaan.',
        }
      };

      function applyLang(lang) {
        const t = dict[lang]; if(!t) return;
        const navLinks = document.querySelectorAll('nav a');
        navLinks[0] && (navLinks[0].textContent = t['nav.home']);
        navLinks[1] && (navLinks[1].textContent = t['nav.projects']);
        navLinks[2] && (navLinks[2].textContent = t['nav.cv']);
        navLinks[3] && (navLinks[3].textContent = t['nav.about']);
        navLinks[4] && (navLinks[4].textContent = t['nav.contact']);

      
        const title = document.getElementById('about-title');
        const name = document.getElementById('about-name');
        const date = document.getElementById('about-date');
        if (title) title.textContent = t['about.title'];
        if (name) name.textContent = t['about.name'];
        if (date) date.textContent = t['about.date'];
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