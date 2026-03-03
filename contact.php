<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact — UniConnect</title>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <style>
 
    .contact-hero {
      padding: 110px 0 56px;
      background: var(--surface-0);
      border-bottom: 1px solid var(--border);
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .contact-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(88,101,242,0.07) 1px, transparent 1px),
        linear-gradient(90deg, rgba(88,101,242,0.07) 1px, transparent 1px);
      background-size: 60px 60px;
      pointer-events: none;
    }
    .contact-hero::after {
      content: '';
      position: absolute;
      top: -160px; right: -160px;
      width: 500px; height: 500px;
      background: radial-gradient(circle, rgba(88,101,242,0.12) 0%, transparent 65%);
      pointer-events: none;
    }
    .contact-hero .container { position: relative; z-index: 1; }
    .contact-hero h1 {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: clamp(2rem, 5vw, 2.9rem);
      color: var(--white);
      margin-bottom: 12px;
      line-height: 1.2;
    }
    .contact-hero p {
      font-size: .96rem;
      color: var(--text-mid);
      max-width: 460px;
      margin: 0 auto;
      line-height: 1.7;
    }

    .contact-section { padding: 72px 0 80px; }
    .contact-grid {
      display: grid;
      grid-template-columns: 340px 1fr;
      gap: 40px;
      align-items: start;
    }

    .contact-infos { display: flex; flex-direction: column; gap: 14px; }
    .ci-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 18px 20px;
      display: flex;
      align-items: flex-start;
      gap: 15px;
      transition: box-shadow .2s, transform .2s, border-color .2s;
    }
    .ci-card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
      border-color: var(--purple-border);
    }
    .ci-icon {
      width: 42px; height: 42px;
      border-radius: var(--radius);
      flex-shrink: 0;
      display: flex; align-items: center; justify-content: center;
      font-size: 17px;
    }
    .ci-icon.v { background: var(--purple-pale); color: var(--purple-light); }
    .ci-icon.b { background: rgba(88,101,242,0.08); color: var(--purple); }
    .ci-icon.g { background: rgba(59,165,92,0.10); color: #3BA55C; }

    .ci-label {
      font-size: .72rem;
      font-weight: 700;
      color: var(--text-soft);
      text-transform: uppercase;
      letter-spacing: .07em;
      margin-bottom: 3px;
    }
    .ci-val  { font-size: .9rem; font-weight: 700; color: var(--white); }
    .ci-sub  { font-size: .78rem; color: var(--text-soft); margin-top: 2px; }

    /* Socials */
    .socials-title {
      font-size: .75rem;
      font-weight: 700;
      color: var(--text-soft);
      text-transform: uppercase;
      letter-spacing: .08em;
      margin: 20px 0 10px 2px;
    }
    .socials { display: flex; gap: 9px; flex-wrap: wrap; }
    .social-link {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 8px 13px;
      border: 1.5px solid var(--border);
      border-radius: var(--radius);
      background: var(--card-bg);
      font-family: 'DM Sans', sans-serif;
      font-size: .82rem;
      font-weight: 600;
      color: var(--text-mid);
      text-decoration: none;
      transition: border-color .2s, color .2s, background .2s, box-shadow .2s;
    }
    .social-link:hover {
      border-color: var(--purple-border);
      color: var(--purple-light);
      background: var(--purple-pale);
      box-shadow: 0 0 16px rgba(88,101,242,0.15);
    }

    /* ── Formulaire ── */
    .cf-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 38px;
      box-shadow: var(--shadow-md);
    }
    .cf-title {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1.35rem;
      color: var(--white);
      margin-bottom: 4px;
    }
    .cf-sub { font-size: .84rem; color: var(--text-soft); margin-bottom: 26px; }

    .cf-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .cf-group { margin-bottom: 16px; }
    .cf-label {
      display: block;
      font-size: .80rem;
      font-weight: 600;
      color: var(--text-mid);
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: 0.4px;
    }
    .cf-label span { color: var(--red, #ED4245); }

    .cf-input,
    .cf-select,
    .cf-textarea {
      width: 100%;
      padding: 11px 13px;
      border: 1.5px solid var(--border);
      border-radius: var(--radius);
      font-family: 'DM Sans', sans-serif;
      font-size: .89rem;
      color: var(--text);
      background: var(--surface-2);
      outline: none;
      box-sizing: border-box;
      transition: border-color .2s, box-shadow .2s, background .2s;
      -webkit-appearance: none;
    }
    .cf-input::placeholder,
    .cf-textarea::placeholder { color: var(--text-soft); opacity: 0.65; }
    .cf-select {
      cursor: pointer;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236e7298' stroke-width='2'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 12px center;
      padding-right: 36px;
    }
    .cf-select option { background: var(--surface-2); color: var(--text); }
    .cf-textarea { min-height: 130px; resize: vertical; }

    .cf-input:focus,
    .cf-select:focus,
    .cf-textarea:focus {
      border-color: var(--purple);
      background: var(--surface-3);
      box-shadow: 0 0 0 3px rgba(88,101,242,0.18);
    }

    .cf-btn {
      width: 100%;
      padding: 13px;
      border: none;
      border-radius: var(--radius);
      background: var(--purple);
      color: var(--white2);
      font-family: 'DM Sans', sans-serif;
      font-size: .95rem;
      font-weight: 700;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: background .2s, transform .15s, box-shadow .2s;
      box-shadow: 0 4px 18px rgba(88,101,242,0.4);
    }
    .cf-btn:hover {
      background: var(--purple-dark);
      transform: translateY(-1px);
      box-shadow: 0 8px 28px rgba(88,101,242,0.55);
    }

    .cf-error {
      display: none;
      background: rgba(237,66,69,0.12);
      border: 1px solid rgba(237,66,69,0.35);
      border-radius: var(--radius);
      padding: 10px 14px;
      font-size: .82rem;
      color: #F38C8E;
      margin-bottom: 14px;
    }

    /* Succès */
    .cf-success { display: none; text-align: center; padding: 20px 0 10px; }
    .cf-success-emoji { font-size: 48px; margin-bottom: 14px; }
    .cf-success h3 {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1.35rem;
      color: var(--white);
      margin-bottom: 8px;
    }
    .cf-success p { font-size: .88rem; color: var(--text-mid); margin-bottom: 20px; }

    .btn-reset {
      padding: 10px 20px;
      border: 1.5px solid var(--purple-border);
      border-radius: var(--radius);
      background: var(--purple-pale);
      color: var(--purple-light);
      font-family: 'DM Sans', sans-serif;
      font-size: .85rem;
      font-weight: 600;
      cursor: pointer;
      transition: background .2s, color .2s, border-color .2s;
    }
    .btn-reset:hover {
      background: rgba(88,101,242,0.2);
      border-color: var(--purple);
      color: var(--white);
    }

    @media(max-width:900px) { .contact-grid { grid-template-columns: 1fr; } }
    @media(max-width:600px) {
      .cf-card { padding: 24px 18px; }
      .cf-row { grid-template-columns: 1fr; }
      .contact-hero { padding: 80px 0 40px; }
    }
  </style>
</head>

<body>

  <?php include 'includes/header.php'; ?>

  <!-- Mobile menu -->
  <div class="mobile-menu" id="mobile-menu">
    <div class="mobile-menu-header">
      <a href="index.php" class="nav-logo">
        <div class="nav-logo-icon"><img src="assets/img/logo.png" width="100%" style="border-radius:20px"></div>
        <span class="nav-logo-text">UniConnect</span>
      </a>
      <button class="mobile-close" onclick="toggleMenu()">✕</button>
    </div>
    <a href="index.php" onclick="toggleMenu()">Accueil</a>
    <a href="index.php#about" onclick="toggleMenu()">À propos</a>
    <a href="contact.php" onclick="toggleMenu()">Contact</a>
    <div class="mobile-btns">
      <a href="connexion.php" class="btn-outline">Connexion</a>
      <a href="inscription.php" class="btn-primary">Inscription gratuite</a>
    </div>
  </div>


  <div class="contact-hero">
    <div class="container">
      <span class="section-label">✉️ Nous écrire</span>
      <h1>Contactez-nous</h1>
      <p>Une question, un problème ou une suggestion ? Notre équipe vous répond sous 24h ouvrées.</p>
    </div>
  </div>

  <!-- ── SECTION ── -->
  <section class="contact-section">
    <div class="container">
      <div class="contact-grid">

        <!-- Infos -->
        <div>
          <div class="contact-infos">
            <div class="ci-card">
              <div class="ci-icon v"><i class="fa-solid fa-envelope"></i></div>
              <div>
                <div class="ci-label">Email</div>
                <div class="ci-val">contact@uniconnect.bj</div>
                <div class="ci-sub">Réponse sous 24h ouvrées</div>
              </div>
            </div>
            <div class="ci-card">
              <div class="ci-icon b"><i class="fa-solid fa-phone"></i></div>
              <div>
                <div class="ci-label">Téléphone</div>
                <div class="ci-val">+229 01 97 00 00 00</div>
                <div class="ci-sub">Lun–Ven, 8h00–17h00</div>
              </div>
            </div>
            <div class="ci-card">
              <div class="ci-icon g"><i class="fa-solid fa-location-dot"></i></div>
              <div>
                <div class="ci-label">Adresse</div>
                <div class="ci-val">Cotonou, Bénin</div>
                <div class="ci-sub">Plateforme 100% numérique</div>
              </div>
            </div>
          </div>
          <div class="socials-title">Nous suivre</div>
          <div class="socials">
            <a href="#" class="social-link"><i class="fa-brands fa-linkedin-in"></i> LinkedIn</a>
            <a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i> Facebook</a>
            <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i> Instagram</a>
          </div>
        </div>

        <!-- Formulaire -->
        <div class="cf-card">
          <div id="cfForm">
            <div class="cf-title">Envoyer un message</div>
            <p class="cf-sub">Champs marqués <span style="color:#F38C8E">*</span> obligatoires.</p>
            <div class="cf-row">
              <div class="cf-group">
                <label class="cf-label">Prénom <span>*</span></label>
                <input type="text" class="cf-input" id="cfPrenom" placeholder="Votre prénom">
              </div>
              <div class="cf-group">
                <label class="cf-label">Nom <span>*</span></label>
                <input type="text" class="cf-input" id="cfNom" placeholder="Votre nom">
              </div>
            </div>
            <div class="cf-group">
              <label class="cf-label">Email <span>*</span></label>
              <input type="email" class="cf-input" id="cfEmail" placeholder="votre@email.com">
            </div>
            <div class="cf-group">
              <label class="cf-label">Vous êtes…</label>
              <select class="cf-select" id="cfProfil">
                <option value="">Choisir un profil</option>
                <option>Étudiant(e)</option>
                <option>Représentant d'une université</option>
                <option>Représentant d'une école / faculté</option>
                <option>Autre</option>
              </select>
            </div>
            <div class="cf-group">
              <label class="cf-label">Sujet <span>*</span></label>
              <select class="cf-select" id="cfSujet">
                <option value="">Choisir un sujet</option>
                <option>Question générale</option>
                <option>Problème technique</option>
                <option>Demande d'inscription (université / école)</option>
                <option>Signalement de contenu</option>
                <option>Partenariat</option>
                <option>Autre</option>
              </select>
            </div>
            <div class="cf-group">
              <label class="cf-label">Message <span>*</span></label>
              <textarea class="cf-textarea" id="cfMessage" placeholder="Décrivez votre demande en détail…"></textarea>
            </div>
            <div class="cf-error" id="cfErr">
              <i class="fa-solid fa-triangle-exclamation"></i> Veuillez remplir tous les champs obligatoires.
            </div>
            <button class="cf-btn" onclick="envoyerContact()">
              <i class="fa-solid fa-paper-plane"></i> Envoyer le message
            </button>
          </div>

          <!-- Succès -->
          <div class="cf-success" id="cfSuccess">
            <div class="cf-success-emoji">✅</div>
            <h3>Message envoyé !</h3>
            <p>Merci. Notre équipe vous répondra dans les <strong>24 heures</strong> ouvrées.</p>
            <button class="btn-reset" onclick="resetForm()">
              <i class="fa-solid fa-rotate-left"></i> Envoyer un autre message
            </button>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── FOOTER ── -->
  <?php include 'includes/footer.php'; ?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLink = document.getElementsByClassName('cont');
      navLink[0].classList.add('active');
    });
    
    window.addEventListener('scroll', () => {
      document.getElementById('main-header').classList.toggle('scrolled', window.scrollY > 20);
    });

    function toggleMenu() {
      const m = document.getElementById('mobile-menu');
      m.classList.toggle('open');
      document.body.style.overflow = m.classList.contains('open') ? 'hidden' : '';
    }

    function envoyerContact() {
      const p = document.getElementById('cfPrenom').value.trim();
      const n = document.getElementById('cfNom').value.trim();
      const e = document.getElementById('cfEmail').value.trim();
      const s = document.getElementById('cfSujet').value;
      const m = document.getElementById('cfMessage').value.trim();
      const err = document.getElementById('cfErr');
      if (!p || !n || !e || !s || !m) { err.style.display = 'block'; return; }
      err.style.display = 'none';
      document.getElementById('cfForm').style.display = 'none';
      document.getElementById('cfSuccess').style.display = 'block';
    }

    function resetForm() {
      document.getElementById('cfForm').style.display = 'block';
      document.getElementById('cfSuccess').style.display = 'none';
      ['cfPrenom', 'cfNom', 'cfEmail', 'cfMessage'].forEach(id => document.getElementById(id).value = '');
      document.getElementById('cfSujet').selectedIndex = 0;
      document.getElementById('cfProfil').selectedIndex = 0;
    }
  </script>
</body>

</html>