// Simuleer gebruikersdata
let loggedIn = false;
const user = { email: "student@ma-web.nl", role: "begeleider" }; // of "admin" of "gebruiker"

// Simuleer blogdata
const blogs = [
  {
    id: 1,
    title: "Eerste stagedag",
    date: "2025-09-01",
    intro: "Vandaag begon mijn stage bij ...",
    content: "Vandaag begon mijn stage bij een leuk bedrijf. Ik heb kennisgemaakt met het team...",
    category: "Stage 1",
    comments: [
      { author: "begeleider", text: "Goed begin! Succes.", visibleFor: ["begeleider", "admin"] }
    ]
  },
  {
    id: 2,
    title: "Project afgerond",
    date: "2025-09-08",
    intro: "Deze week heb ik mijn eerste project afgerond.",
    content: "Het project was uitdagend maar ik heb veel geleerd over teamwork en deadlines.",
    category: "Stage 2",
    comments: []
  }
];

// Pagina's
function showGuestPage() {
  document.getElementById("content").innerHTML = `
    <h2>Geen toegang</h2>
    <p>Je moet ingelogd zijn om de blogs te bekijken.</p>
  `;
}
function showBlogOverview(category = null) {
  if (!loggedIn) return showGuestPage();
  let filtered = category ? blogs.filter(b => b.category === category) : blogs;
  filtered = filtered.sort((a, b) => new Date(b.date) - new Date(a.date));
  document.getElementById("content").innerHTML = `
    <h2>Blog Overzicht</h2>
    ${filtered.map(blog => `
      <div class="blog-item">
        <div class="blog-title">${blog.title}</div>
        <div class="blog-date">${blog.date} | ${blog.category}</div>
        <div>${blog.intro}</div>
        <button onclick="showBlogDetail(${blog.id})">Lees meer</button>
      </div>
    `).join("")}
  `;
}
window.showBlogDetail = function(id) {
  if (!loggedIn) return showGuestPage();
  const blog = blogs.find(b => b.id === id);
  if (!blog) return document.getElementById("content").innerHTML = "<p>Bericht niet gevonden.</p>";
  document.getElementById("content").innerHTML = `
    <h2>${blog.title}</h2>
    <div class="blog-date">${blog.date} | ${blog.category}</div>
    <div>${blog.content}</div>
    <h3>Comments</h3>
    <div>
      ${blog.comments.filter(c => c.visibleFor.includes(user.role)).map(c => `
        <div class="comment"><b>${c.author}:</b> ${c.text}</div>
      `).join("")}
      <form id="comment-form">
        <input type="text" id="comment-input" placeholder="Plaats een comment..." required>
        <button type="submit">Plaatsen</button>
      </form>
    </div>
    <button onclick="showBlogOverview()">Terug</button>
  `;
  document.getElementById("comment-form").onsubmit = function(e) {
    e.preventDefault();
    const text = document.getElementById("comment-input").value;
    if (text.trim()) {
      blog.comments.push({ author: user.role, text, visibleFor: ["begeleider", "admin"] });
      showBlogDetail(id);
    }
  };
};
function showAbout() {
  document.getElementById("content").innerHTML = `
    <h2>Wie ben ik</h2>
    <p>Ik ben een enthousiaste stagiair bij ...</p>
  `;
}

// Menu events
document.getElementById("menu-overzicht").onclick = () => showBlogOverview();
document.getElementById("menu-stage1").onclick = () => showBlogOverview("Stage 1");
document.getElementById("menu-stage2").onclick = () => showBlogOverview("Stage 2");
document.getElementById("menu-about").onclick = () => showAbout();

// Login/Logout
document.getElementById("login-btn").onclick = () => {
  loggedIn = true;
  document.getElementById("login-btn").style.display = "none";
  document.getElementById("logout-btn").style.display = "inline";
  showBlogOverview();
};
document.getElementById("logout-btn").onclick = () => {
  loggedIn = false;
  document.getElementById("login-btn").style.display = "inline";
  document.getElementById("logout-btn").style.display = "none";
  showGuestPage();
};

// Startpagina
showGuestPage();

    // Demo login (alleen voor demo, geen echte beveiliging!)
    document.getElementById('loginForm').onsubmit = function(e) {
      e.preventDefault();
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value;
      if(email.endsWith('@ma-web.nl') && password.length >= 4) {
        window.location.href = "index.html";
      } else {
        document.getElementById('loginError').style.display = "block";
      }
    };